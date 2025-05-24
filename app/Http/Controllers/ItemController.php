<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemForeign;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
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
        return view('item.view',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();
        if($request->hasFile('photo')){
           $destination='public/photos/';
           $image = $request->file('photo');
           $image_name=$image->getClientOriginalName();
           $path= $request->file('photo')->storeAs($destination,$image_name);
           $input['photo']=$image_name;


        }

        Item::create($input);
        return redirect('item');
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
        $item=Item::find($id);
        return view('item.edit',compact('item'));
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
        $item=Item::find($id);
        $input= $request->all();
        if($request->hasFile('photo')){
           $destination='/public/photos/';
           $image = $request->file('photo');
           $image_name=$image->getClientOriginalName();
           $path= $request->file('photo')->storeAs($destination,$image_name);
           $input['photo']=$image_name;


        }

      $item->update($input);
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        if($item->photo){
            $photo = $item->photo;
        $filePath = "/storage/photos/".$photo;
        if(file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        }

        }
        $item->delete();
        return redirect('item')->with('successAlert','You Have Successfully Deleted');
    }
    public function photo($id)
    {
        $item=Item::find($id);
        return view('item.photo_view',compact('item'));
    }


    public function search_item(Request $request)
    {
       $search_text = $_GET['query'];
       $search_remark = $_GET['remark'];
       $item= Item::  where(function($query) use($search_text){
        $query->where('items.dx','like', '%'.$search_text.'%')
        ->orWhere('items.name','like', '%'.$search_text.'%')
        ->orWhere('items.joka','like', '%'.$search_text.'%')
        ->orWhere('items.roll_grade','like', '%'.$search_text.'%')
        ->orWhere('items.tk','like', '%'.$search_text.'%');

    })->where(function($query) use($search_remark){
        $query->where('items.remark','like', '%'.$search_remark.'%');


    })->get();
       return view('item.search',compact('item'));
    }


}
