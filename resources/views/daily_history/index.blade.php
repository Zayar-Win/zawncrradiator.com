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
                            <select  class="form-select" aria-label="Default select example" name="shop" id="shop">
                                <option value="">Filter by Shop</option>
                                <option value="cnc">CNC</option>
                                <option value="ncr">NCR</option>
                                <option value="nagoya">Nagoya</option>
                            </select>
                            </div>
                {{-- <div class="col-md-5 mb-3">
                    <input type="month" class="form-control " name="month_date" id="month_date" >
                    </div> --}}
                    <button id="search" style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);"
                    class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>




                                <table class="table table-bordered table-hover">

                                    <thead>
                                        <tr>
                                            <td>Order ID</td>
                                            <td> Date</td>
                                            <td>Customer Name</td>
                                            <td>Shop</td>
                                            <td>Type</td>
                                            <td>Item Name</td>
                                            <td>Price </td>
                                            <td>Quantity</td>
                                            <td>Amount</td>


                                        </tr>

                                    </thead>


                                    <tbody id="tbody">
                                        @foreach ( $order_details as $order )
                                        <tr>
                                        <td>{{$order->order->id}}</td>
                                        <td>{{$order->order->date}}</td>
                                        <td>{{$order->order->name}}</td>
                                        <td class="text-danger"> <strong>{{$order->order->shop}}</strong></td>
                                        <td>{{$order->order->customer_type}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->amount}}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                    <tfoot id="table_footer">
                                        <tr>
                                            <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                            <th class="text-danger">Total_Amount</th>
                                            <th class="text-danger">{{number_format($order_details->sum('amount'),2)}}</th>
                                        </tr>

                                    </tfoot>

                                </table>
                            </div>
                        </div>

</div>



@endsection



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').on('click', function(){


var date = $('#date').val();
var month_date = $('#month_date').val();
var customer_type = $('#customer_type').val();
var shop = $('#shop').val();
var tbody = document.getElementById('tbody');
tbody.innerHTML = '';

var tableFooter = document.getElementById('table_footer');
        tableFooter.innerHTML = '';

$.ajax({
    url:'{{route('search_daily_history')}}',
    type:'GET',
    data:{'month_date':month_date,'date':date,'customer_type':customer_type,'shop':shop},
    success:function(data) {

        console.log(data)
        var package = data.package;
        package.forEach(item => {


        tbody.innerHTML +=


        '<tr>'+
        '<td>' + item.id + '</td>'+

        '<td>' + item.date + '</td>'+
        '<td>' + item.name + '</td>'+

        '<td>' + item.shop + '</td>'+
        '<td>' + item.customer_type + '</td>'+

        '<td>' + item.item_name + '</td>'+
        '<td>' + item.price + '</td>'+

        '<td>' + item.quantity + '</td>'+
        '<td>' + item.amount + '</td>'+


      '</tr>';

                      })

                      tableFooter.innerHTML +=  data.total_amount == '' ? '' :
                        '<tr>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                            '<td>'  + '</td>'+
                        '<th class="text-danger">Total Amount</th>'+
                        '<th class="text-danger">'+data.total+'</th>'+
                        '</tr>';

            }
              })
    });
});
</script>
