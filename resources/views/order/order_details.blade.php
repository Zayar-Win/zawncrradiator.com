@extends('layouts.template')
@section('content')

<div class="container mt-5">



     <div class="row">
           <div class="col-md-1"></div>
           <div class="col-md-11" >




                    <table  class="table table-bordered table-hover">
                        <thead>
<tr>

    <th>Item Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Amount</th>
    <th>Action</th>
    </tr>
        </thead>
                        <tbody id="tbody">

    @foreach ($order_details as $order )
    <tr>

        <td>{{$order->name}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->amount}}</td>

        <td>
            {{-- <a href="{{url('order/'.$order->id.'/details')}}" style="text-decoration: none;">
                <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i> Details</button>
            </a> --}}
        <form action="{{ url('order/'.$order->id) }}" method="POST">
        @method('DELETE')
        @csrf

            <button  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"> </i> Delete  </button>


    </form>
</td>
    </tr>
    @endforeach

<tr>
    <td></td>
    <td></td>

    <td class="text-success"> <strong>Total</strong></td>
    <td class="text-success"><strong>{{number_format($order_details->sum('amount'),2)}}</strong></td>
</tr>

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



{{-- @section('script')
<script>

</script>

@endsection --}}
