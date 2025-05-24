@extends('layouts.template')
@section('content')

<div class="container mt-5">



     <div class="row">
           <div class="col-md-1"></div>
           <div class="col-md-11" >

            <div class="row">
                <div class="col-md-5 mb-3">
                        <input type="date" class="form-control " name="date" id="date" >
                        </div>
                        {{-- <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="type" id="type">
                            <option value="">Filter by Customer Type</option>

                            <option value="pay">Pay</option>
                            <option value="debt">Debt</option>
                        </select>
                        </div>
                        <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="t_type" id="t_type">
                            <option value="">Filter by  Type</option>

                            <option value="normal">Normal</option>
                            <option value="permanent">Permanent</option>
                        </select>
                        </div> --}}
                <div class="col-md-4">
                        <input type="search" class="form-control " name="query" id="name"   style="  border-radius:20px"  placeholder="search name" >
                        </div>

                        <button id="search" style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);"
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>

                    <div>
                    <table  class="table table-bordered table-hover">
                        <thead>
<tr>

    <th>Date</th>
    <th>Customer Type</th>
    <th>Customer Name</th>
    <th>Phone</th>
    <th> Type</th>
    {{-- <th>Item Name</th> --}}
    <th>Price</th>
    <th>Quantity</th>
    <th>Amount</th>
    <th>Item</th>

    </tr>
                        </thead>
                        <tbody id="tbody">

    @foreach ($orders as $order )
    <tr>

        <td>{{$order->tank_order->date}}</td>
        <td>{{$order->tank_order->customer_type}}</td>
        <td>{{$order->tank_order->name}}</td>
        <td>{{$order->tank_order->phone}}</td>
        <td>{{$order->tank_order->type}}</td>
        {{-- <td>{{$order->tank->name}}</td> --}}
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->amount}}</td>
        <td>{{$order->tank_order->item}}</td>


    </tr>
    @endforeach

                        </tbody>

                    </table>


                    </div>

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
var type = $('#type').val();
var t_type = $('#t_type').val();
var tbody = document.getElementById('tbody');
tbody.innerHTML = '';



$.ajax({
    url:'{{route('search_order_tank')}}',
    type:'GET',
    data:{'name':query,'date':date, 'type':type,'t_type':t_type},
    success:function(data) {
        console.log(data)

        data.forEach(item => {

            if(item.item == null){
        item.item = '';
    }

        tbody.innerHTML +=
        // '<tr>'+
        // '<td>'+ 'Order ID' +'</td>'+
        // '<td>' + item.id + '</td>'+
        // '</tr>'+

        '<tr>'+

        '<td>' + item.date + '</td>'+

        '<td>' + item.customer_type + '</td>'+

        '<td>' + item.name + '</td>'+

        '<td>' + item.phone + '</td>'+
        '<td>' + item.type + '</td>'+


        '<td>' + item.price + '</td>'+

        '<td>' + item.quantity + '</td>'+

        '<td>' + item.amount + '</td>'+

        '<td>' + item.item + '</td>'+
        '</tr>';

                      })

            }
              })
    });
});

</script>
