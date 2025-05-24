<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Tank;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanks = Tank::all();
       $items= Item::all();
       $orders=Order::all();
        return view('order.index',['items'=>$items,'orders'=>$orders,'tanks'=>$tanks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// dd($request->all());
/////order Model///////////////////
       $orders = new Order;
       $orders->date =  $request->date;
       $orders->customer_type =  $request->customer_type;
       $orders->name =  $request->name;
       $orders->phone =  $request->phone;
       $orders->type =  $request->type;
       $orders->item =  $request->item;
       $orders->shop =  $request->shop;
       $orders->seller =  $request->seller;
       $orders->save();


////////////d//////////Order Details Model//////////////////
$order_id = $orders->id;
$item_ids = $request->item_id;
$price = $request->price;
$quantity= $request->quantity;
$amount= $request->amount;
$name=$request->item_name;


$tank_ids = $request->tank_id;
$tank_price = $request->tank_price;
$tank_quantity= $request->tank_quantity;

$tank_amount= $request->tank_amount;
$tank_name=$request->tank_name;
// foreach($item_ids as $item_id){
// OrderDetail::created([
//     'order_id'=> $order_id,
//     'item_id'=>$item_id,
//     'price'=> $request->price,
//     'quantity'=>$request->quantity,
//     'amount'=> $request->amount,
// ]);
// }
        // for($item_id =0; $item_id < count($request->item_id); $item_id++) {
        //     $order_details = new OrderDetail;
        //     $order_details->order_id = $order_id;
        //     $order_details->item_id = $request->item_id[$item_id];
        //     $order_details->price = $request->price[$item_id];
        //     $order_details->quantity = $request->quantity[$item_id];
        //     $order_details->amount = $request->amount[$item_id];
        //     $order_details->save();
        // }
        for($i=0; $i < count($item_ids); $i++){
            $datasave = [
               'item_id'=>$item_ids[$i],
                'order_id'=>$order_id,
                'price'=> $price[$i],
                'amount'=> $amount[$i],
                'quantity'=> $quantity[$i],
                'name'=> $name[$i],

            ];


            OrderDetail::insert($datasave);
            $item_qty = Item::where('id',$item_ids[$i])->first();
            $item_qty->quantity -= $quantity[$i];
            $item_qty->save();
        }
        for($i=0; $i < count($tank_ids); $i++){
            $datasaves = [
               'tank_id'=>$tank_ids[$i],
                'order_id'=>$order_id,
                'price'=> $tank_price[$i],
                'amount'=> $tank_amount[$i],
                'quantity'=> $tank_quantity[$i],
                'name'=>$tank_name[$i],



            ];
            OrderDetail::insert($datasaves);
            $tank_qty = Tank::where('id',$tank_ids[$i])->first();
            $tank_qty->quantity -= $tank_quantity[$i];
            $tank_qty->save();

        };
///////////////Quantity -calculate /////////




///////////////////////////////////////////


            /////order history////

            $items =  Item::all();
            $LastOrderID= Order::max('id');
            $lastID = OrderDetail::max('order_id');
            $order_details= OrderDetail::where('order_id',$order_id)->get();
            $order_receipt= OrderDetail::where('order_id',$lastID )->whereNotNull('name')->get();
            $orderedBy= Order::where('id',$order_id)->get();
            $order = Order::where('id',$LastOrderID)->get();

            return view ('order.print',[
                'items' => $items,
                'order_details' => $order_details,
                'customer_orders'=> $orderedBy,
                'order_receipt'=>$order_receipt,
                'order'=>$order,

            ]);



    }

    public function history()
    {
        $items =  Item::all();
        $orders = Order::all()->sortDesc();
        // $orders = OrderDetail::select('order_details.*')->join('orders','orders.id','=','order_details.order_id')->get();
        return view ('order.history',[
        'orders' => $orders,

        ]);


    }
    public function details($id)
    {
        $order_id=Order::find($id);

        $order_details= OrderDetail::where('order_details.order_id',$id)->get();
        return view('order.order_details',compact('order_details'));

    }
    public function order_details_print($id)
    {
        $order_id=Order::find($id);
        $orders = Order::where('id','=',$id)->get();

        $order_details= OrderDetail::where('order_details.order_id',$id)->get();
        return view('order.order_details_print',compact('order_details','orders'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function store_user(Request $request,$id)
    {

        $order = new Order;
        $order->date = $request->input('date');
        $order->customer_type = $request->input('customer_type');
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->qty = $request->input('qty');
        $order->price = $request->input('price');
        $order->item = $request->input('item');
        $order->type = $request->input('type');
        $order->item_id = $id;
        $order->amount = $request->input('qty')*$request->input('price');
        $order->save();
        $item= Item::where('id',$id)->first();
        $item->quantity -=$order->qty;
        $item->save();

        return view('item.user_print',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function delete($id)
    {

         Order::find($id)->delete();
        OrderDetail::where('order_id',$id)->delete();


        return redirect()->back()->with('successAlert','You Have Successfully Deleted');
    }
    public function search_delete($id)
    {

         Order::find($id)->delete();
        OrderDetail::where('order_id',$id)->delete();


        return redirect()->back()->with('successAlert','You Have Successfully Deleted');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $orders = OrderDetail::find($id);
        $orders->delete();
        return redirect()->back()->with('successAlert','You Have Successfully Deleted');
    }
    public function print_item($id)
    {
        $order = Order::select('orders.*','items.name as item_name')
        ->join('items', 'items.id', '=', 'orders.item_id')
        ->where('orders.id', $id)->first();


        return view ('item.print_view',compact('order'));
    }
    public function search_order(Request $request)
    {


        if($request->ajax()){

            $searchData = $request->name;
            $searchDate = $request->date;
            $searchType = $request->type;
            $searchCustomerType = $request->customer_type;
            $data =  Order::
            where(function($query) use($searchData){
                $query->where('orders.name','like', '%'.$searchData.'%')
                ->orwhere('orders.id','like', '%'.$searchData.'%');


            })   -> where(function($query) use($searchCustomerType){
                $query->where('orders.customer_type','like', '%'.$searchCustomerType.'%');


            })->  where(function($query) use($searchDate){
                $query->where('orders.date','like', '%'.$searchDate.'%');

            })->where('orders.type', 'like', '%'.$searchType.'%')
            ->orderBy('orders.id', 'DESC')->get();


            $total=0;
            foreach($data as $pack){
                $total +=$pack->amount;

                   }
                   $pack->total=$total;
            return response()->json($data);
        }

}


}
