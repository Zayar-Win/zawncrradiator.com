@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <div>
        <table class="table table-bordered table-hover">


            <thead>
                <tr>
                    <th>Date</th>
                 <th>NCR</th>
                    <th>DX</th>
                    <th>Joka</th>
                    <th>TK</th>
                    <th>Item Name</th>
                    {{-- <th>Photo</th> --}}
                    <th>PA/AT/MT</th>
                    <th>Size</th>
                    <th>High</th>
                    @if(Auth::user()->status=='admin')
                    <th>Dx Price</th>
                    <th>Joka Price</th>
                    <th>TK Price</th>

                    @endif



                    <th>Quantity</th>
                    @if(Auth::user()->status=='admin')


                    <th>CBM</th>
                    <th>Action</th>
                    @endif
                    <!-- <th>Amount</th> -->


                </tr>
            </thead>

            <tbody id="tbody">

                @foreach($items as $item)

                <tr>
                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                  <td>{{$item->ncr_id}}</td>

                    <td>{{ $item -> dx }}</td>
                    <td>{{ $item -> joka }}</td>
                    <td>{{ $item -> tk }}</td>
                    <td>{{ $item -> name }}</td>
                    {{-- <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td> --}}
                    <td>{{ $item -> pa }}</td>
                    <td>{{ $item -> size }}</td>
                    <td>{{ $item -> high }}</td>
                    @if(Auth::user()->status=='admin')
                    <td><strong>{{ $item -> dx_price }}</strong></td>
                    <td><strong>{{ $item -> joka_price }}</strong></td>
                    <td><strong>{{ $item -> tk_price }}</strong></td>

                    @endif


                    <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> quantity }}</strong></td>
                    @if(Auth::user()->status=='admin')

                    <td>{{ $item -> cbm }}</td>
                    @endif

                    <!-- <td class="text-primary"><strong>{{ $item -> amount }}</strong></td> -->

                    <form action="{{ url('history_delete/'.$item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td>
                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                        </td>

                    </form>
                        </td>

                </tr>


             @endforeach


            </tbody>




        </table>
        </div>

    </div>
</div>


@endsection
