<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Models\Item;
use App\Models\Tank_Order;
use App\Models\TankOrder;
use App\Models\TankOrderDetail;
use Illuminate\Http\Request;

class Tank_OrderController extends Controller
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
        $items= Item::all();
        $tanks= Tank::all();
        $orders=TankOrder::all();
         return view('tank_order.index',['tanks'=>$tanks,'orders'=>$orders,'items'=>$items]);
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


        $orders= new TankOrder;
        $orders->date =  $request->date;
        $orders->customer_type =  $request->customer_type;
        $orders->name =  $request->name;
        $orders->phone =  $request->phone;
        $orders->type =  $request->type;
        $orders->item =  $request->item;
        $orders->save();

        $order_id = $orders->id;
        $tank_ids = $request->tank_id;
        $price = $request->price;
        $quantity= $request->quantity;
        $amount= $request->amount;


        for($i=0; $i < count($tank_ids); $i++){
            $datasave = [
               'tank_id'=>$tank_ids[$i],
                'tank_order_id'=>$order_id,
                'price'=> $price[$i],
                'amount'=> $amount[$i],
                'quantity'=> $quantity[$i],

            ];

            TankOrderDetail::insert($datasave);
            $tank_qty = Tank::where('id',$tank_ids[$i])->first();
            $tank_qty->quantity -= $quantity[$i];
            $tank_qty->save();
        }

        $tanks =  Tank::all();
        $lastID = TankOrderDetail::max('tank_order_id');
        $order_details= TankOrderDetail::where('tank_order_id',$order_id)->get();
        $order_receipt= TankOrderDetail::where('tank_order_id',$lastID )->get();
        $orderedBy= TankOrder::where('id',$order_id)->get();

        return view ('tank_order.print',[
            'tanks' => $tanks,
            'order_details' => $order_details,
            'customer_orders'=> $orderedBy,
            'order_receipt'=>$order_receipt,

        ]);

    }
    public function history()
    {
        $tanks =  Tank::all();
        $orders = TankOrderDetail::select('tank_order_details.*')->join('tank_orders','tank_orders.id','=','tank_order_details.tank_order_id')->get();
        return view ('tank_order.history',[
        'orders' => $orders,

        ]);


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
    public function store_user(Request $request,$id)
    {

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $order = TankOrder::find($id);
        $order->delete();
        return redirect('tank_order')->with('successAlert','You Have Successfully Deleted');
    }
    public function print_tank($id)
    {
        $order = TankOrder::select('tank__orders.*','tanks.name as tank_name')
        ->join('tanks', 'tanks.id', '=', 'tank__orders.tank_id')
        ->where('tank__orders.id', $id)->first();


        return view ('tank.print_view',compact('order'));
    }
    public function search_order(Request $request)
    {
        if($request->ajax()){

            $searchData = $request->name;
            $searchDate = $request->date;
            $searchType = $request->type;
            $searchCustomer = $request->t_type;
            $data =  TankOrder::select('tank_orders.*','tank_order_details.price as price',
            'tank_order_details.quantity as quantity','tank_order_details.amount as amount')
            ->join('tank_order_details', 'tank_order_details.tank_order_id', '=', 'tank_orders.id')
            -> where(function($query) use($searchCustomer){
                $query->where('tank_orders.customer_type','like', '%'.$searchCustomer.'%');
            })->
                 where(function($query) use($searchData){
                $query->where('tank_orders.name','like', '%'.$searchData.'%');

            })   -> where(function($query) use($searchType){
                $query->where('tank_orders.type','like', '%'.$searchType.'%');

            })->where('tank_orders.date', 'like', '%'.$searchDate.'%')->get();

            // $total=0;
            // foreach($data as $pack){
            //     $total +=$pack->amount;

            //        }
            //        $pack->total=$total;
            return response()->json($data);
        }

}
}
