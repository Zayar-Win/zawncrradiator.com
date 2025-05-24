@extends('layouts.template')
@section('content')
<div class="container mt-5">
 <div class="row">
 <div class="col-md-1">
 </div>
<div class="col-md-7">
    <div class="card">
        <div class="card-header  text-white" style="background: rgb(95, 44, 130);">
        <h6>Basic Details</h6>
    
        </div>
<div class="card-body">

     <form action="{{url ('order/'.$item->id.'/store') }}" method="POST" >     
         @csrf
     <div class="row checkout-form">
             
     <div class="col-md-6">
     
         <label for="date"  class="mb-2 mt-2">Date</label>
                            <input type="date" name="date" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="customer_type"  class="mb-2 mt-2">Customer Type</label>
         <select  class="form-select" aria-label="Default select example" name="customer_type" >
                        <option value="pay">Pay</option>    
                        <option value="debt">Debt</option>
                        </select>
         </div>
       
         <div class="col-md-6">
         <label for="name"  class="mb-2 mt-2"> Customer Name</label>
                            <input type="text" name="name" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                            <input type="text" name="phone" class="form-control" 
                             required >
         </div>
     
         <div class="col-md-6">
         <label for="qty"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="qty" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="text"  class="mb-2 mt-2">Price</label>
                            <input type="number" name="price" class="form-control" 
                             required >
         </div>
         <div class="col-md-12">
         <label for="type"  class="mb-2 mt-2"> Type</label>
         <select  class="form-select" aria-label="Default select example" name="type" >
                        <option value="normal">Normal</option>    
                        <option value="permanent">Permanent</option>
                        </select>
         </div>
         <div class="col-md-12">
         <div class="form-group">
                            <label for="item"  class="mb-2 mt-2">Item</label>
                            <textarea name="item" rows="2" class="form-control" ></textarea>
                            
                        </div>
         </div>
      
         <div class="mt-4 ">
                    <button class="btn text-white form-control" style="background: rgb(95, 44, 130);">Create Order</button>
                       </div>
                     
                 
       
     </div>
     </form>
 
     <!-- @if(Auth::user()->status=='user')
     <form action="{{url ('order/'.$item->id.'/store_user') }}" method="POST" >     
         @csrf
     <div class="row checkout-form">
             
     <div class="col-md-6">
     
         <label for="date"  class="mb-2 mt-2"> User Date</label>
                            <input type="date" name="date" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="customer_type"  class="mb-2 mt-2">Customer Type</label>
         <select  class="form-select" aria-label="Default select example" name="customer_type" >
                        <option value="pay">Pay</option>    
                        <option value="debt">Debt</option>
                        </select>
         </div>
         <div class="col-md-6">
         <label for="name"  class="mb-2 mt-2"> Customer Name</label>
                            <input type="text" name="name" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                            <input type="text" name="phone" class="form-control" 
                             required >
         </div>
     
         <div class="col-md-6">
         <label for="qty"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="qty" class="form-control" 
                             required >
         </div>
         <div class="col-md-6">
         <label for="text"  class="mb-2 mt-2">Price</label>
                            <input type="number" name="price" class="form-control" 
                             required >
         </div>
         <div class="col-md-12">
         <div class="form-group">
                            <label for="item"  class="mb-2 mt-2">Item</label>
                            <textarea name="item" rows="2" class="form-control" ></textarea>
                            
                        </div>
         </div>
      
         <div class="mt-4 ">
                    <button class="btn text-white form-control" style="background: rgb(95, 44, 130);">Create Order</button>
                       </div>
                     
                 
       
     </div>
     </form>
     @endif -->
 </div>
 </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-header  text-white" style="background: rgb(95, 44, 130);">
            <h6>Item Details</h6>
          

        </div>
        <div class="card-body">
        <table  class="table table-bordered table-hover">
        <tr>
            <td>Item ID</td>
            <td>{{$item->id}}</td>
            </tr>
            <tr>
            <td>Item Name</td>
            <td>{{$item->name}}</td>
            </tr>
            <tr>
            <td>Regular Price</td>
            <td>{{$item->regular}}</td>

            </tr>
            <tr>
            <td>Two Piece Price</td>
            <td>{{$item->two_piece}}</td>

            </tr>
            <tr>
            <td>Three Piece Price</td>
            <td>{{$item->three_piece}}</td>

            </tr>
            <tr>
            <td>Quantity</td>
            <td>{{$item->quantity}}</td>

            </tr>
          
      
        </table>
        </div>
    </div>
</div>
 </div>
    </div>
    
    @endsection

