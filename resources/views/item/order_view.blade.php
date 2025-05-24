@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
           
               
            
                <div class="row">  
                <div class="col-md-5 mb-3">
                        <input type="date" class="form-control " name="date" id="date" >
                        </div>
                        <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="type" id="customer_type">
                            <option value="">Filter by Customer Type</option>
                          
                            <option value="pay">Pay</option>
                            <option value="debt">Debt</option>
                        </select>
                        </div>
                        <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="type" id="type">
                            <option value="">Filter by  Type</option>
                          
                            <option value="normal">Normal</option>
                            <option value="permanent">Permanent</option>
                        </select>
                        </div>
                <div class="col-md-4">
                        <input type="search" class="form-control " name="query" id="name"   style="  border-radius:20px"  placeholder="search items" >
                        </div>
                       
                        <button id="search" style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);" 
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>
                  
                    <div>
      
                </div>
            
               </div>

               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-11">
                   <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content " id="card" >
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
            <td>Type</td>
            <td>{{$order->type}}</td>
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
            <tr>
            <td>Item </td>
            <td>{{$order->item}}</td>
            </tr>
                            </table>
                         
                       
                        
                            </div>
                         <div class="table-footer pb-2" id="card-footer">
                             <div class="float-end">
                         <a href="{{url('/order/'.$order->id.'/print')}}" style="text-decoration:none;">
                         
                          <button class="btn  btn-sm text-white "  style="background: rgb(95, 44, 130);"  > <i class="fa fa-print"></i> Create Print</button>
                                </a>
                             </div>
                             @if(Auth::user()->status=='admin')
                                <div>
                                <form action="{{ url('order/'.$order->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"> </i> Delete  </button>
                                </td>

                            </form>
                                </div>
                                @endif
                         </div>
                        </div>
                     
                        </div>
                       
         
                     @endforeach
                    
            </div>
            
                
           
            <div class="text-center">
                         
                                <div class="card-header mt-5 mb-5" id="total"> </div>
                           
                        </div>
                   </div>
               </div>
            
           
            </div>
            
        </div>
    </div>
    


@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('click', function(){
            var query = $('#name').val();
            var date = $('#date').val();
            var customer_type = $('#customer_type').val();
            var type = $('#type').val();
            var card = document.getElementById('card');
            card.innerHTML = '';
            var card_total = document.getElementById('total');
            card_total.innerHTML = '';
          
          
          $.ajax({
                url:'{{route('search_order')}}',
                type:'GET',
                data:{'name':query,'date':date, 'customer_type':customer_type,'type':type,},
                success:function(data) {
                    console.log(data)
                    
                    data.forEach(item => {
              
                        if(item.total == null){
                    item.total = '';
                }
                    
                    card.innerHTML +=  
                    '<div class="col-md-4">' +
                    '<div class="card ">'+
                    '<div class="card-header">'+
                    '<h5>'+ 'NCR' + '</h5>'+
                    '</div>'+
                    '<div class="card-body">'+
                    '<table class="table table-bordered table-hover">'+
                    '<tr>'+
                    '<td>'+ 'Order ID' +'</td>'+
                    '<td>' + item.id + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Date' +'</td>'+
                    '<td>' + item.date + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Customer Type' +'</td>'+
                    '<td>' + item.customer_type + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Customer Name' +'</td>'+
                    '<td>' + item.name + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Item Name' +'</td>'+
                    '<td>' + item.item_name + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Price' +'</td>'+
                    '<td>' + item.price + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Quantity ' +'</td>'+
                    '<td>' + item.qty + '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>'+ 'Amount ' +'</td>'+
                    '<td>' + item.amount + '</td>'+
                    '</tr>'+
                    '</table>'+
                    '</div>'+
                    '<div class="card-footer">'+
                   
                    '<div class="float-end"  style="text-decoration:none;">'+
                    '<button  class="btn  btn-sm text-white"  style="background: rgb(95, 44, 130);" onclick="generatePrint('+item.id+')">'+
                '<i class="fa fa-print" ></i> <strong>Create Print</strong></button></td>'+
                '</div>'+
                    '</div>';
                    card_total.innerHTML +=  
                    item.total == '' ? '' : '<tr><th>Total Amount ::</th><th colspan="12">'+item.total+'</th></tr>';
               
                      })
                        
            }
              })
    }); 
});
function generatePrint(id) {
        window.location.href = 'order/'+id+'/print';
        var container = document.getElementById('search');
        var content = container.innerHTML;
        container.innerHTML = content;
        console.log('refreshed');        
    }
</script>
