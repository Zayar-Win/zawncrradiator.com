@extends('layouts.template')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">



            <form class="form-inline" type="get" action="{{url('/search')}}">
                <div class="row mb-3 ">
                    <div class="col-md-4">
                        <input type="search" class="form-control " name="query" style="  border-radius:20px" placeholder="search items">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Default select example" name="remark" id="customer_type">
                            <option value="">Filter by Remark</option>

                            <option value="Toyota">Toyota</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Mitsu">Mitsu</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Isuzu">Isuzu</option>
                            <option value="Honda">Honda</option>
                            <option value="Dai">Dai</option>
                            <option value="Hyun">Hyun</option>
                            <option value="Kia">Kia</option>
                            <option value="Hitachi">Hitachi</option>
                            <option value="Condenser ">Condenser </option>
                        </select>
                    </div>
                    <button style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);"
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>

            </form>

        </div>

        @if(Auth::user()->status=='admin')
        <div>
            <a href="{{url('item/create')}}">
                <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                    <i class="fa fa-plus-circle"></i> Add New
                </button>
            </a>
        </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NCR ID</th>
                    <th>ID</th>
                    <th>DX</th>
                    <th>Joka</th>
                    <th>TK</th>
                    <th>T Pic</th>
                    <th>Item Name</th>
                    <th>Photo</th>
                    <th>PA/AT/MT</th>
                    <th>Size</th>
                    <th>High</th>
                    @if(Auth::user()->status=='admin')
                    <th>Dx Price</th>
                    <th>Joka Price</th>
                    <th>TK Price</th>
                    <th>T Pic Price</th>
                    <th>Dx MM Price</th>
                    <th>Joka MM price</th>
                    <th>TK MM Price</th>
                    <th>T Pic MM Price</th>
                    @endif
                    <th>Regular</th>
                    <th>Two Piece</th>
                    <th>Three Piece</th>


                    <th>Quantity</th>
                    @if(Auth::user()->status=='admin')
                    <th>Fixed Quantity</th>
                    <th>CNC Quantity</th>
                    <th>Nagoya Quantity</th>
                    <th>CBM</th>
                    @endif
                    <!-- <th>Amount</th> -->
                    <th>Roll Grade</th>
                    <th>Remark</th>

                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                @foreach($item as $item)
                <tr>
                    <td>{{$item->ncr_id}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{ $item -> dx }}</td>
                    <td>{{ $item -> joka }}</td>
                    <td>{{ $item -> tk }}</td>
                    <td>{{ $item -> t_pic }}</td>
                    <td>{{ $item -> name }}</td>
                    <td><img src="{{ asset('/storage/photos/'. $item->photo) }}" style="width: 100px; height:100px;" /></td>
                    <td>{{ $item -> pa }}</td>
                    <td>{{ $item -> size }}</td>
                    <td>{{ $item -> high }}</td>
                    @if(Auth::user()->status=='admin')
                    <td><strong>{{ $item -> dx_price }}</strong></td>
                    <td><strong>{{ $item -> joka_price }}</strong></td>
                    <td><strong>{{ $item -> tk_price }}</strong></td>
                    <td><strong>{{ $item -> t_pic_price }}</strong></td>
                    <td><strong>{{ $item -> dx_mm }}</strong></td>
                    <td><strong>{{ $item -> joka_mm }}</strong></td>
                    <td><strong>{{ $item -> tk_mm }}</strong></td>
                    <td><strong>{{ $item -> t_pic_mm }}</strong></td>
                    @endif
                    <td>{{ $item -> regular }}</td>
                    <td>{{ $item -> two_piece }}</td>

                    <td>{{ $item -> three_piece }}</td>


                    <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> quantity }}</strong></td>
                    @if(Auth::user()->status=='admin')
                    <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> fixed_quantity}}</strong></td>
                    <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> cnc_quantity}}</strong></td>
                    <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> nagoya_quantity}}</strong></td>
                    <td>{{ $item -> cbm }}</td>
                    @endif

                    <!-- <td class="text-primary"><strong>{{ $item -> amount }}</strong></td> -->
                    <td>{{ $item -> roll_grade }}</td>
                    <td>{{ $item -> remark }}</td>

                    <td>
                        <a href="{{url('item/'.$item->id.'/photo')}}" style="text-decoration: none;">
                            <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
                        </a>
                        @if(Auth::user()->status=='admin')
                    <td>

                        <a href="{{url('item/'.$item->id.'/edit')}}" style="text-decoration: none;">
                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                        </a>
                    </td>
                    <form action="{{ url('item/'.$item->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                        </td>

                    </form>

                    @endif
                </tr>
                @endforeach
            </tbody>


        </table>
    </div>

</div>
</div>



@endsection