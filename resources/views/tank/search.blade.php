@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
           
               
            
                <form class="form-inline" type="get" action="{{url('/search_tank')}}">
                <div class="row mb-3 ">   
                <div class="col-md-4">
                        <input type="search" class="form-control " name="query"   style="  border-radius:20px"  placeholder="search items" >
                        </div>
                        <div class="col-md-4">
                        <select  class="form-select" aria-label="Default select example" name="remark" >
                            <option value="">Filter by Remark</option>
                          
                            <option value="To">Toyota</option>
                            <option value="Ni">Nissan</option>
                            <option value="Mi">Mitsu</option>
                            <option value="Ho">Honda</option>
                         
                            <option value="Is">Isuzu</option>
                            <option value="Maz">Mazda</option>
                            <option value="Dai">Dai</option>
                            <option value="Hyun">Hyun</option>
                            <option value="Kia">Kia</option>
                            <option value="Suz">Suzuki</option>
                      
                      
                        </select>
                        </div>
                      
                        <button  style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);" 
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                        
                    </form>
                    
               </div>
               @if(Auth::user()->status=='admin')
               <a href="{{url('tank/create')}}" >
                   <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                       <i class="fa fa-plus-circle"></i> Add New
                   </button>
               </a> 
           @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NarYe Code</th>
                            <th>Howyang</th>
                            <th> Name</th>
                           
                            <th>Photo</th>
                            
                            <th>Tank Size</th>
                            <th>Pipe Size</th>
                            <th>Up/Down</th>
                           
                            @if(Auth::user()->status=='admin')
                            <th>NarYe  Price</th>
                            <th>Howyang Price</th>
                            <th>NarYe FOB  Price</th>
                            <th>Howyang FOB Price</th>
                            @endif
                           
                            <th>Regular Price</th>
                            <th>Quantity</th>
                            
                            @if(Auth::user()->status=='admin')
                            <th>Fixed Quantity</th>
                            @endif
                            <th>Remark</th>
                           
                           
                            <!-- <th>Amount</th> -->
                           
                           
                            <th>Order</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach($tank as $tank)
                        <tr>
                            <td>{{$tank->no}}</td>
                            <td>{{ $tank -> narye_code }}</td>
                            <td>{{ $tank -> code }}</td>
                            
                            <td>{{ $tank -> name }}</td>
                            <td><img src="{{ asset('/storage/app/public/tank/'. $tank->photo) }}" style="width: 100px; height:100px;"/></td>
                           
                            <td>{{ $tank -> tank }}</td>
                            <td>{{ $tank -> pipe_size }}</td>
                            <td>{{ $tank -> up_down }}</td>
                           
                            @if(Auth::user()->status=='admin')
                            <td><strong>{{ $tank -> narye_code_price }}</strong></td>
                            <td><strong>{{ $tank -> code_price }}</strong></td>
                            <td>{{ $tank -> narye_mm}}</td>
                            <td>{{ $tank -> code_mm }}</td>
                            @endif
                         
                            <td>{{ $tank -> price }}</td>
                           
                            <td style="color: rgb(95, 44, 130);"><strong>{{ $tank -> quantity }}</strong></td>
                            @if(Auth::user()->status=='admin')
                            <td style="color: rgb(95, 44, 130);"><strong>{{ $tank -> fixed_quantity}}</strong></td>
                           
                        
                           @endif
                           <td>{{$tank->remark}}</td>
                          <td >
                          <a href="{{url('tank/'.$tank->id.'/order')}}" style="text-decoration: none;">
                                    <button class="btn btn-sm text-white" style="background: rgb(95, 44, 130);width:80px;"> <i class="fa fa-shopping-cart"></i> Order</button>
                                </a>
                          </td>
                            <td>
                            <a href="{{url('tank/'.$tank->id.'/photo')}}" style="text-decoration: none;">
                                    <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
                                </a>
                                @if(Auth::user()->status=='admin')
                            <td>
                          
                            <a href="{{url('tank/'.$tank->id.'/edit')}}" style="text-decoration: none;">
                                    <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
                                </a>
                                </td>
                                <form action="{{ url('tank/'.$tank->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
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