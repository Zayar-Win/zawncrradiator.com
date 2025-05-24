
@extends('layouts.template')
@section('content')

@if(Auth::user()->status=='dx')
<div class="row my-5">
    <div class="col-md-2"></div>

    <div class="col-md-6" id="hide_dx">
        @foreach ($items as $item)
        <div class="card">
            <div class="card-header text-white" style="background: rgb(70, 9, 44)">
                Item list
            </div>
            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Date</th>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th>Dx</th>
                        <td> {{$item->dx}}</td>
                    </tr>
                    <tr>
                        <th>ItemName</th>
                        <td> {{$item->name}}</td>
                    </tr>
                    <tr>
                        <th>PA/AT/MT</th>
                        <td> {{$item->pa}}</td>
                    </tr>
                    <tr>
                        <th>Size</th>
                        <td> {{$item->size}}</td>
                    </tr>


                    <tr>
                        <th>High</th>
                        <td> {{$item->high}}</td>
                    </tr>
                    <tr>
                        <th>Dx Price</th>
                        <td> {{$item->dx_price}}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td> {{$item->quantity}}</td>
                    </tr>
                    <tr>
                        <th>CBM</th>
                        <td> {{$item->cbm}}</td>
                    </tr>
                    {{-- <tr>
                        <td>Photo</td>
                        <td><img src="{{ asset('/storage/foreign/'. $item->photo) }}"
                             style="width: 100px; height:100px;"/></td>
                    </tr> --}}
                </table>


            </div>


        </div>
        @endforeach
    </div>

    <div class="col-md-4">
        <form action="{{url ('message') }}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="card mb-">
            <div class="card-header">
                Information Box
            </div>


            <div class="card-body">

                <table  class="table table-bordered table-hover">
                    <tr>



                    </tr>
                        <tr>

                            <td>  <div class="form-group">
                                <label for="title"  class="mb-2 mt-2">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div> </td>

                        </tr>



                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="deposit"  class="mb-2 mt-2">Deposit</label>
                                    <input type="text" name="deposit" class="form-control">
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="total"  class="mb-2 mt-2">Total</label>
                                    <input type="text" name="total" class="form-control">
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="dod"  class="mb-2 mt-2">Date Of Departures</label>
                                    <input type="date" name="dod" class="form-control">
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="photo"  class="mb-2 mt-2">Photo</label>
                                    <input type="file" name="photo" class="form-control"  >
                                </div>
                             </td>
                        </tr>
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="message"  class="mb-2 mt-2">Message </label>
                                    <textarea name="message" rows="2" class="form-control" ></textarea>

                            </div> </td>
                        </tr>
                </table>

                 </div>


        </div>
        <button class="btn text-white form-control" style="background: rgb(70, 9, 44);">Send</button>
    </form>
    </div>



        </div>
        <button class="btn text-white form-control" style="background: rgb(70, 9, 44);">Send</button>
    </form>
    </div>

</div>
@endif

    @if(Auth::user()->status=='admin')
    <div class="row my-5">
        <div class="col-md-2"></div>
            <div class="col-md-7" >
                @foreach ($items as $item)
                <div class="card" id="hahah">
                    <div class="card-header text-white" style="background: rgb(70, 9, 44)">
                        Item list
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Date</th>
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            </tr>
                            <tr>
                                <th>Dx</th>
                                <td> {{$item->dx}}</td>
                            </tr>
                            <tr>
                                <th>ItemName</th>
                                <td> {{$item->name}}</td>
                            </tr>
                            <tr>
                                <th>PA/AT/MT</th>
                                <td> {{$item->pa}}</td>
                            </tr>

                            <tr>
                                <th>Size</th>
                                <td> {{$item->size}}</td>
                            </tr>

                            <tr>
                                <th>High</th>
                                <td> {{$item->high}}</td>
                            </tr>
                            <tr>
                                <th>Dx Price</th>
                                <td> {{$item->dx_price}}</td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td> {{$item->quantity}}</td>
                            </tr>
                            <tr>
                                <th>CBM</th>
                                <td> {{$item->cbm}}</td>
                            </tr>
                            {{-- <tr>
                                <td>Photo</td>
                                <td><img src="{{ asset('/storage/foreign/'. $item->photo) }}"
                                     style="width: 100px; height:100px;"/></td>
                            </tr> --}}
                        </table>


                        <div class="float-end">
                        <form action="{{ url('foreign_item_view/'.$item->id.'/destroy') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <td>
                                <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                            </td>

                        </form>
                        </div>
                        <div class="float-start">

                            <a href="{{url('foreign_item_view/'.$item->id.'/edit')}}" style="text-decoration: none;">
                                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                            </a>
                            </div>
                    </div>


                </div>
                @endforeach
            </div>
            @endif


</div>



@endsection
