<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class DailyHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all_order= Order::all();
        // $order_details=OrderDetail::all();
        $order_details= OrderDetail::select('order_details.*')->join('orders','order_details.order_id','=','orders.id')
                                    ->where('orders.customer_type','=','လက်ငင်း')
                                    ->where('orders.shop','!=',null)
                                    ->orderBy('orders.id', 'DESC')
                                   ->get();
        $orders= Order::select('orders.*','order_details.order_id as order_id','order_details.name as item_name','order_details.quantity as quantity',
        'order_details.price as price','order_details.amount as amount')
                                            ->join('order_details','orders.id','=','order_details.order_id')

                                            ->orderBy('orders.id', 'DESC')->get();
        return view('daily_history.index',[

            'orders'=>$orders,
            'all_order'=>$all_order,
            'order_details'=>$order_details,

        ]);
    }
    public function search_daily_history(Request $request)
    {
        if($request->ajax()){

            $searchMonthDate = $request->name;
            $searchDate = $request->date;
            $searchType = $request->type;
            $searchShop = $request->shop;
            $searchCustomerType = $request->customer_type;
            $data =  Order::select('orders.*','order_details.order_id as order_id','order_details.name as item_name','order_details.quantity as quantity',
            'order_details.price as price','order_details.amount as amount')
                                                ->join('order_details','orders.id','=','order_details.order_id')
                                                ->where('orders.customer_type','=','လက်ငင်း')
                                                ->where('orders.shop','!=',null)
                                                ->
                 where(function($query) use($searchMonthDate){
                $query->where('orders.date','like', '%'.$searchMonthDate.'%');



            }) ->  where(function($query) use($searchDate){
                $query->where('orders.date','like', '%'.$searchDate.'%');

            }) ->  where(function($query) use($searchShop){
                $query->where('orders.shop','like', '%'.$searchShop.'%');

            })->where('orders.type', 'like', '%'.$searchType.'%')
            ->orderBy('orders.id', 'DESC')->get();
            $total=0;
            foreach($data as $package)
            {
                $total+=$package->amount;
            }
            $response = [
                'package' => $data,
                'total' => $total,

            ];

            return response()->json($response);
        }
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
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
