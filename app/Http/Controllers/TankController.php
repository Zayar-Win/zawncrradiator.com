<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Models\Tank_Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TankController extends Controller
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
        $tanks=Tank::all();
        return view('tank.view',compact('tanks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tank.create');
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

      if($request->hasFile('photo')){
        $destination='public/tank/';
        $image = $request->file('photo');
        $image_name=$image->getClientOriginalName();
        $path= $request->file('photo')->storeAs($destination,$image_name);
        $input['photo']=$image_name;


     }

     Tank::create($input);
        return redirect('tank');
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
        $tank= Tank::find($id);
        return view ('tank.edit',compact('tank'));
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
        $tank = Tank::find($id);
        $input = $request->all();

        if($request->hasFile('photo')){
          $destination='public/tank/';
          $image = $request->file('photo');
          $image_name=$image->getClientOriginalName();
          $path= $request->file('photo')->storeAs($destination,$image_name);
          $input['photo']=$image_name;


       }

       $tank->update($input);
       return redirect('/tank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tank= Tank::find($id);
        if($tank->photo){
            $image = $tank->photo;
        $filePath = "/storage/tank/".$image;
        if(file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }
        }
        $tank->delete();
        return redirect('tank')->with('successAlert','You Have Successfully Deleted');
    }

    public function photo($id)
    {
        $tank=Tank::find($id);
        return view('tank.photo_view',compact('tank'));
    }

    public function order($id)
    {
        $tank=Tank::find($id);
        return view('tank.order',compact('tank'));
    }
    public function search_tank(Request $request)
    {
       $search_text = $_GET['query'];
       $search_remark = $_GET['remark'];
       $tank= Tank::  where(function($query) use($search_text){
        $query->where('tanks.narye_code','like', '%'.$search_text.'%')
                ->orWhere('tanks.code','like', '%'.$search_text.'%')
                ->orWhere('tanks.no','like', '%'.$search_text.'%')
                ->orWhere('tanks.name','like', '%'.$search_text.'%');

    })-> where(function($query) use($search_remark){
        $query->where('tanks.remark','like', '%'.$search_remark.'%');


    })->get();
       return view('tank.search',compact('tank'));
    }

}
