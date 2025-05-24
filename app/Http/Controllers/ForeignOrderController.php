<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Item;
use App\Models\ItemForeign;
use App\Models\ItemJoka;
use App\Models\ItemTk;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForeignOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function foreign_order($id)
    {

        $item=Item::find($id);
        return view('foreign_order.item_foreign_order',compact('item'));
    }
    public function foreign_item_order_create(Request $request)
    {
        $input= $request->all();
    //      if($request->hasFile('photo')){
    //         $destination='public/foreign/';
    //         $image = $request->file('photo');
    //         $image_name=$image->getClientOriginalName();
    //         $path= $request->file('photo')->storeAs($destination,$image_name);
    //         $input['photo']=$image_name;
    //    }

        ItemForeign::create($input);
        return redirect('item');
    }
    public function foreign_joka_order_create(Request $request)
    {

        $input= $request->all();
         ItemJoka::create($input);
        return redirect('item');
    }
    public function foreign_tk_order_create(Request $request)
    {

        $input= $request->all();
         ItemTk::create($input);
        return redirect('item');
    }
    public function foreign_item_view()
    {
        $message= Message::all();
        $items= ItemForeign::all();
        return view('foreign_order.item_foreign_view',compact('items','message'));
    }
    public function foreign_joka_view()
    {
        $items = ItemJoka::all();
        return view('foreign_order.item_joka_view',compact('items'));
    }
    public function foreign_tk_view()
    {
        $items = ItemTk::all();
        return view('foreign_order.item_tk_view',compact('items'));
    }
    public function message(Request $request)
    {
     $input = $request->all();
       $input['name']= Auth::user()->name;
       $input['email'] = Auth::user()->email;


       if($request->hasFile('photo')){
        $destination='public/Message/';
        $image = $request->file('photo');
        $image_name=$image->getClientOriginalName();
        $path= $request->file('photo')->storeAs($destination,$image_name);
        $input['photo']=$image_name;
   }

        Message::create($input);
        return redirect()->back();
    }

    public function edit($id)
    {
        $item= ItemForeign::find($id);
        return view ('foreign_order.item_foreign_edit',compact('item'));
    }


    public function joka_edit($id)
    {
        $item= ItemJoka::find($id);
        return view ('foreign_order.item_joka_edit',compact('item'));
    }
    public function tk_edit($id)
    {
        $item= ItemTk::find($id);
        return view ('foreign_order.item_tk_edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $items = ItemForeign::find($id);
        $input = $request->all();

        if($request->hasFile('photo')){
            $destination='public/foreign/';
            $image = $request->file('photo');
            $image_name=$image->getClientOriginalName();
            $path= $request->file('photo')->storeAs($destination,$image_name);
            $input['photo']=$image_name;
       }

       $items->update($input);
      History::create($input);
       return redirect('/foreign_item_view');
    }
    public function joka_update(Request $request, $id)
    {
        $items = ItemJoka::find($id);
        $input = $request->all();

        if($request->hasFile('photo')){
            $destination='public/foreign/';
            $image = $request->file('photo');
            $image_name=$image->getClientOriginalName();
            $path= $request->file('photo')->storeAs($destination,$image_name);
            $input['photo']=$image_name;
       }

       $items->update($input);
      History::create($input);
       return redirect('/foreign_joka_view');
    }
    public function tk_update(Request $request, $id)
    {
        $items = ItemTk::find($id);
        $input = $request->all();

        if($request->hasFile('photo')){
            $destination='public/foreign/';
            $image = $request->file('photo');
            $image_name=$image->getClientOriginalName();
            $path= $request->file('photo')->storeAs($destination,$image_name);
            $input['photo']=$image_name;
       }

       $items->update($input);
      History::create($input);
       return redirect('/foreign_tk_view');
    }



    public function destroy($id){
        $items = ItemForeign::find($id);
        $items->delete();
        return redirect()->back()->with('successAlert','You Have Successfully Deleted');

    }
    public function joka_destroy($id){
        $items = ItemJoka::find($id);
        $items->delete();
        return redirect()->back()->with('successAlert','You Have Successfully Deleted');

    }
    public function tk_destroy($id){
        $items = ItemTk::find($id);
        $items->delete();
        return redirect()->back()->with('successAlert','You Have Successfully Deleted');

    }








public function history(){
    $items = History::all()->sortDesc();
    return view('foreign_order.history',compact('items'));
}
public function history_delete($id){
    $history = History::find($id);
    $history->delete();
    return redirect()->back()->with('successAlert','You Have Successfully Deleted');
}





public function message_view(){
    $message = Message::all()->sortDesc();
    return view('foreign_order.message',compact('message'));
}
public function message_photo($id){
    $message = Message::find($id);
    return view('foreign_order.photo_view',compact('message'));
}

public function message_delete($id){
    $message = Message::find($id);
    $message->delete();
    return redirect()->back()->with('successAlert','You Have Successfully Deleted');
}





}
