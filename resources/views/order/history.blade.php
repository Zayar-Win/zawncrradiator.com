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
                       <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="type" id="customer_type">
                            <option value="">Filter by Customer Type</option>

                            <option value="လက်ငင်း">လက်ငင်း</option>
                            <option value="အကြွေ">အကြွေ</option>
                        </select>
                        </div>
                        {{-- <div class="col-md-5 mb-3">
                        <select  class="form-select" aria-label="Default select example" name="type" id="type">
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
    <th>Order ID</th>
    <th>Date</th>
    <th>Customer Type</th>
    <th>Customer Name</th>
    <th>Phone</th>

    <th>Type</th>
    <th>Shop</th>
    <th>Owner</th>
    <th>Seller Name</th>
    <th colspan="2">Action</th>
    </tr>
                        </thead>
                        <tbody id="tbody">

    @foreach ($orders as $order )
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->date}}</td>
        <td>{{$order->customer_type}}</td>
        <td>{{$order->name}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->type}}</td>
        <td>{{$order->shop}}</td>
        <td>{{$order->item}}</td>
        <td>{{$order->seller}}</td>
        <td>

            <a href="{{url('order/'.$order->id.'/order_details_print')}}" style="text-decoration: none;">
                <button class="btn btn-secondary btn-sm"><i class="fa fa-print"></i> Print</button>
            </a>
        </td>
        <td>

            <a href="{{url('order/'.$order->id.'/details')}}" style="text-decoration: none;">
                <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i> Details</button>
            </a>
        </td>

        <td>
        <form action="{{ url('order/'.$order->id.'/delete') }}" method="POST">
        @method('DELETE')
        @csrf

            <button  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"> </i> Delete  </button>


    </form>
</td>
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
var customer_type = $('#customer_type').val();
var tbody = document.getElementById('tbody');
tbody.innerHTML = '';



$.ajax({
    url:'{{route('search_order')}}',
    type:'GET',
    data:{'name':query,'date':date, 'type':type,'customer_type':customer_type},
    success:function(data) {
        console.log(data)

        data.forEach(item => {

            if(item.item == null){
        item.item = '';

    }
    if(item.shop == null){
        item.shop = '';

    }
    if(item.seller == null){
        item.seller = '';

    }

        tbody.innerHTML +=
        // '<tr>'+
        // '<td>'+ 'Order ID' +'</td>'+
        // '<td>' + item.id + '</td>'+
        // '</tr>'+

        '<tr>'+
        '<td>' + item.id + '</td>'+

        '<td>' + item.date + '</td>'+

        '<td>' + item.customer_type + '</td>'+

        '<td>' + item.name + '</td>'+

        '<td>' + item.phone + '</td>'+
        '<td>' + item.type + '</td>'+
        '<td>' + item.shop + '</td>'+
        '<td>' + item.item + '</td>'+
        '<td>' + item.seller + '</td>'+
        '<td>'+

'<button clas class="btn btn-secondary btn-sm" onclick="printFunction('+item.id+')"> <i class="fa fa-print"></i> Print</button></td>'+

        '<td>'+

                    '<button clas class="btn btn-dark btn-sm" onclick="detailsFunction('+item.id+')"> <i class="fa fa-search"></i> Details</button></td>'+

                    '<td>'+

'<button clas class="btn btn-danger btn-sm" onclick="deleteFunction('+item.id+')"> <i class="fa fa-trash"></i> Delete</button></td>'+
        '</tr>';

                      })

            }
              })
    });
});
function printFunction(id)
    {

        event.preventDefault();
        window.location.href = '/order/'+id+'/order_details_print';

    }
function detailsFunction(id)
    {

        event.preventDefault();
        window.location.href = '/order/'+id+'/details';

    }
    function deleteFunction(id)
    {

        event.preventDefault();
        window.location.href = '/order/'+id+'/search_delete';

    }
</script>

{{-- @section('script')
<script>

</script>

@endsection --}}
