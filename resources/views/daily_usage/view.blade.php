@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
           
            <a href="{{url('daily_usage/create')}}" >
                   <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                       <i class="fa fa-plus-circle"></i> Add New
                   </button>
               </a> 
               <form class="form-inline" type="get" action="{{url('/search_daily')}}">
                <div class="row mt-3">  
                <div class="col-md-5 mb-3  ">
                        <input type="date" class="form-control " name="date" id="date" >
                        </div>
                       
                        <button id="search" style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);" 
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>
                </div>
               </form>
                    <div>
      
                </div>
            
               </div>

               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-11">
                   <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content " id="card" >
                @foreach($daily as $daily)
                    
                        <div class="col-md-6 px-3 py-3 form-control">
                        <div class="card ">
                            <div class="card-header text-center">
                                <h5>Daily Usage Reccord</h5>
                            </div>
                            <div class="card-body">
           <div class="mb-5">                 
          
          <h6 class="float-end">  {{$daily->date}} </h6> <br>
           </div>
          
            {{$daily->daily_usage}}
            
           
                            
                         
                       
                        
                            </div>
                            @if(Auth::user()->status=='admin')
                         <div class="table-footer pb-2" id="card-footer">
                         <form action="{{ url('daily_usage/'.$daily->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>
                                    <button  class="btn btn-danger btn-sm mx-5 float-end " onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i> Delete</button>
                                </td>

                            </form>
                        </div>
                     @endif
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
