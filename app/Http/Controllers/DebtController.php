<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\DebtDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DebtController extends Controller
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
        $debt = Debt::all()->sortDesc();
        return view('debt.view',compact('debt'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('debt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
         Debt::create($input);
         return redirect('debt');
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
        // $orders = OrderDetail::select('order_details.*','order.name')
        //             ->join('orders','orders.id','=','order_details.order_id')->get();
       $orders = Order::select('orders.*','order_details.amount as amount')
                ->join('order_details','order_id','=','orders.id')->whereNotNull('order_details.name')->get();


        $debt=Debt::find($id);
        return view('debt.edit',compact('debt','orders'));
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

        $debt = Debt::find($id);
        $debt->total_amount = $request->input('total_amount');
        $debt->name = $request->input('name');
        $debt->date = $request->input('date');
        $debt->phone = $request->input('phone');
        $debt->address = $request->input('address');
        $debt->reason = $request->input('reason');
            $debt->save();


            $debt_id = $id;
        $debt_id = $debt_id;
        $order_ids = $request->item_id;
        $debt_date = $request->debt_date;
        $amount = $request->price;
        $paid_amount = $request->paid;
        $remaining_amount = $request->remaining_amount;
        $total=$request->total;


        for($i=0; $i < count($order_ids); $i++){
            $datasave = [
               'order_id'=>$order_ids[$i],
                'debt_id'=>$debt_id,
                'debt_date'=>$debt_date[$i],
                'amount'=> $amount[$i],
                'paid_amount'=> $paid_amount[$i],
                'remaining_amount'=>$remaining_amount[$i],
                'total'=> $total[$i],


            ];


            DebtDetail::insert($datasave);

        }

        return redirect('debt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Debt::find($id)->delete();
        DebtDetail::where('debt_id',$id)->delete();


        return redirect('debt')->with('successAlert','You Have Successfully Deleted');
         //
    }
    public function delete($id)
    {

        $debt = DebtDetail::find($id);
        $debt->delete();
        return redirect()->back()->with('successAlert','You Have Successfully Deleted');
    }
    public function search_debt(Request $request)
    {


        if($request->ajax()){

            $searchData = $request->name;

            $data =  Debt::
            where(function($query) use($searchData){
                $query->where('debts.name','like', '%'.$searchData.'%')->
                orwhere('debts.phone','like', '%'.$searchData.'%');

            })  ->get();

            return response()->json($data);
        }

}

public function debt_list($id)
{
    $debt_lists= DebtDetail::where('debt_id',$id)->get();
    $debt=Debt::find($id);
    return view('debt.debt_list',compact('debt','debt_lists'));
}
}
