@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
           
               
            
         
                    <div>
      
                </div>
            
               </div>
<!-- 
               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-11" >
                   <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content-center "  >
             
                    
                        <div class="col-md-10 px-3 py-3">
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
                         
                            <div class="table-footer" id="footer">
                      
                          <button class="btn  btn-sm text-white float-end py-2  " id="print"  style="background: rgb(95, 44, 130); border-radius:20px"  > <i class="fa fa-print"></i> Generate Print</button>
                                
                         </div>
                        
                            </div>
                      
                        </div>
                        </div>
                        
       
            </div>
            
                
           

                   </div>
               </div>
             -->
           

             <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-11" >
                   <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content-center "  >
             
                    
                        <div class="col-md-10 px-3 py-3">
                        <div class="card ">
                            <div class="card-header">
                                <h5>NCR</h5>
                            </div>
                            <div class="card-body">
                            <table  class="table table-bordered table-hover">
        <tr>
            
            <th>Date</th>
            <th>Customer Type</th>
            <th>Customer Name</th>
            <th>Item </th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Amount</th>
            
            </tr>
            <tr>
            
            <td>{{$order->date}}</td>
            <td>{{$order->customer_type}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->item}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->qty}}</td>
            <td>{{$order->amount}}</td>
            </tr>
          
         
                            </table>
                         
                            <div class="table-footer" id="footer">
                      
                          <button class="btn  btn-sm text-white float-end py-2  " id="print"  style="background: rgb(95, 44, 130); border-radius:20px"  > <i class="fa fa-print"></i> Generate Print</button>
                                
                         </div>
                        
                            </div>
                      
                        </div>
                        </div>
                        
       
            </div>
            
                
           

                   </div>
               </div>
            

            </div>
          
        </div>
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

 
  <script type="text/javascript">
    $('#print').on('click', function() {
$('#footer').hide();
window.print();
});
    </script>

@endsection