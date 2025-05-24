<?php

namespace App\Http\Controllers;

use App\Models\DailyUsage;
use Illuminate\Http\Request;

class DailyUsageController extends Controller
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
        $daily = DailyUsage::all()->sortDesc();
        return view ('daily_usage.view',compact('daily'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('daily_usage.create');

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
        DailyUsage::create($input);
        return redirect('daily_usage');
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
        $daily=DailyUsage::find($id);
        $daily->delete();
        return redirect('daily_usage')->with('successAlert','You Have Successfully Deleted');
    }
    public function search_daily(Request $request)
    {




            $searchDate = $_GET['date'];
            // $searchDate = $request->date;

            $daily =  DailyUsage::
          where('daily_usages.date', 'like', '%'.$searchDate.'%')->get();

            // $total=0;
            // foreach($data as $pack){
            //     $total +=$pack->amount;

            //        }
            //        $pack->total=$total;
            return view('daily_usage.search',compact('daily'));

}
}
