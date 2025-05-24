@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
           
               
            
                <form class="form-inline" type="get" action="{{url('/search_order')}}">
                <div class="row mb-3 float-end">   
                <div class="col-md-6">
                        <input type="search" class="form-control " name="query"   style="  border-radius:20px"  placeholder="search items" >
                        </div>
                       
                        <button  style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);" 
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>
                    </form>
                    <div>
      
                </div>
            
               </div>

               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-11">
                   <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content "  >
                @foreach($order as $order)
                    
                        <div class="col-md-4 px-3 py-3">
                        <div class="card ">
                            <div class="card-header">
                                <h5>NCR</h5>
                            </div>
                            <div class="card-body">
                            <table  class="table table-bordered table-hover">
        <tr>
            <td>Order ID</td>
            <td>{{$order->id}}</td>
            </tr>
            <tr>
            <td>Date</td>
            <td>{{$order->date}}</td>
            </tr>
            <tr>
            <td>Customer Type</td>
            <td>{{$order->customer_type}}</td>
            </tr>
            <tr>
            <td>Customer Name</td>
            <td>{{$order->name}}</td>
            </tr>
            <tr>
            <td>Item Name</td>
            <td>{{$order->item_name}}</td>
            </tr>
            
            <tr>
            <td>Price</td>
            <td>{{$order->price}}</td>

            </tr>
            <tr>
            <td>Quantity</td>
            <td>{{$order->qty}}</td>

            </tr>
            <tr>
            <td>Amount </td>
            <td>{{$order->amount}}</td>
            </tr>
                            </table>
                         
                       
                        
                            </div>
                         <div class="table-footer pb-2">
                         <a href="{{url('/order/'.$order->id.'/print')}}" style="text-decoration:none;" class="float-end">
                          <button class="btn  btn-sm text-white "  style="background: rgb(95, 44, 130);"  > <i class="fa fa-print"></i> Create Print</button>
                                </a>
                         </div>
                        </div>
                        </div>
                        
                       
                     @endforeach
            </div>
            
                
           

                   </div>
               </div>
            
           
            </div>
            
        </div>
    </div>
    


@endsection