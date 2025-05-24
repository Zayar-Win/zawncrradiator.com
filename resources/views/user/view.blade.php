@extends('welcome')
@section('content')
<div class="container mt-5">
 
        <div class="row">

            <div class="col-md-12">
           
               
            
                <form class="form-inline" type="get" action="{{url('/search')}}">
                <div class="row mb-3">   
                <div class="col-md-5    ">
                        <input type="search" class="form-control " name="query"   style="  border-radius:20px"  placeholder="search items" >
                        </div>
                       
                        <button  style="width: 130px; padding:10px; border-radius:20px" class="btn btn-dark btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                        
                    </form>
                    
               </div>
             
            
           
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DX</th>
                            <th>Joka</th>
                            <th>TK</th>
                            <th>Item Name</th>
                            <th>Photo</th>
                            <th>PA/AT/MT</th>
                            <th>Size</th>
                            <th>High</th>
                            <th>Regular</th>
                            <th>Two Piece</th>
                            <th>Three Piece</th>
                            <th>Fixed Quantity</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Remark</th>
                          
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($item as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{ $item -> dx }}</td>
                            <td>{{ $item -> joka }}</td>
                            <td>{{ $item -> tk }}</td>
                            <td>{{ $item -> name }}</td>
                            <td><img src="{{ asset('/storage/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
                            <td>{{ $item -> pa }}</td>
                            <td>{{ $item -> size }}</td>
                            <td>{{ $item -> high }}</td>
                            <td>{{ $item -> regular }}</td>
                            <td>{{ $item -> two_piece }}</td>
                           
                            <td>{{ $item -> three_piece }}</td>
                            <td class="text-danger"><strong>{{ $item -> fixed_quantity}}</strong></td>
                            <td class="text-danger"><strong>{{ $item -> quantity }}</strong></td>
                            <td class="text-primary"><strong>{{ $item -> price }}</strong></td>
                            <td class="text-primary"><strong>{{ $item -> amount }}</strong></td>
                            <td>{{ $item -> remark }}</td>
                          
                            <td>
                            <a href="{{url('user/'.$item->id.'/photo')}}" style="text-decoration: none;">
                                    <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
                                </a>
                            <td>
                            <a href="{{url('user/'.$item->id.'/edit')}}" style="text-decoration: none;">
                                    <button class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></button>
                                </a>
                                </td>
                                <form action="{{ url('user/'.$item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                </td>

                            </form>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
               
              
                </table>
            </div>
            
        </div>
    </div>
    @endsection


