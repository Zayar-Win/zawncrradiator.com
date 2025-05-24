@extends('layouts.template')
@section('content')
<!-- 1. BOOTSTRAP v4.0.0         CSS !-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- 2. GOOGLE JQUERY JS v3.2.1  JS !-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- 3. BOOTSTRAP v4.0.0         JS !-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container mt-5">
<style>
#nav{
    height: 100%;
    display: inline-flex;
    flex-direction: row;


}



</style>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">



                <form class="form-inline" type="get" action="{{url('/search')}}">
                <div class="row mb-3 ">
                <div class="col-md-4">
                        <input type="search" class="form-control " name="query"   style="  border-radius:20px"  placeholder="search items" >
                        </div>
                        <div class="col-md-4">
                        <select  class="form-select" aria-label="Default select example" name="remark" id="customer_type">
                            <option value=""> by Remark</option>

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
                            <option value="Mazda">Mazda</option>
                            <option value="Condenser">Condenser </option>
                        </select>
                        </div>
                        <button  style="width: 130px; padding:10px; border-radius:20px;background: rgb(95, 44, 130);"
                        class="btn text-white btn-sm mb-3 p-2" type="submit"><i class="fa fa-search"></i> Search</button>

                    </form>

               </div>

               @if(Auth::user()->status=='admin')
               <div>
               <a href="{{url('item/create')}}" >
                   <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                       <i class="fa fa-plus-circle"></i> Add New
                   </button>
               </a>

            </div>
           @endif
           <div>
            <ul class="nav nav-tabs" id="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#all" data-toggle="tab">ALL</a>
                  </li>

                <li class="nav-item">
                  <a class="nav-link" href="#toyota" data-toggle="tab">Toyota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#nissan" data-toggle="tab">Nissan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#mitsu" data-toggle="tab"></i>Mitsu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#suzuki" data-toggle="tab"></i>Suzuki</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#isuzu" data-toggle="tab"></i>Isuzu</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#honda" data-toggle="tab"></i>Honda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#dai" data-toggle="tab"></i>Dai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#hyun" data-toggle="tab"></i>Hyun</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#Kia" data-toggle="tab">Kia</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#hitachi" data-toggle="tab">Hitachi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mazda" data-toggle="tab"></i>Mazda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#con" data-toggle="tab">Condenser</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#other" data-toggle="tab">Other</a>
                  </li>

              </ul>
                </div>
                <div id='content' class="tab-content">
                    <div class="tab-pane active" id="all">
                        <table class="table table-bordered table-hover">


                       <thead>
                           <tr>
                            <th>NCR ID</th>
                               <th>ID</th>
                               <th>DX</th>
                               <th>Joka</th>
                               <th>TK</th>
                               <th>T pic</th>
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

                           @foreach($items as $item)

                           <tr>
                             <td>{{$item->ncr_id}}</td>
                               <td>{{$item->id}}</td>
                               <td>{{ $item -> dx }}</td>
                               <td>{{ $item -> joka }}</td>
                               <td>{{ $item -> tk }}</td>
                               <td>{{ $item -> t_pic }}</td>
                               <td>{{ $item -> name }}</td>
                               <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                       <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                   </td>

                               </form>
                               <td >
                                <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                          <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                      </a>
                                </td>
                               @endif
                           </tr>


                        @endforeach


                       </tbody>




                   </table>
                        </div>

                        <div class="tab-pane " id="toyota">
                            <table class="table table-bordered table-hover">


               <thead>
                   <tr>
                    <th>NCR ID</th>

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

                   @foreach($items as $item)
                   @if($item->remark=='Toyota')
                   <tr>
                    <td>{{$item->ncr_id}}</td>

                       <td>{{ $item -> dx }}</td>
                       <td>{{ $item -> joka }}</td>
                       <td>{{ $item -> tk }}</td>
                       <td>{{ $item -> t_pic }}</td>
                       <td>{{ $item -> name }}</td>
                       <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                               <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                           </td>

                       </form>
                       <td >
                        <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                  <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                              </a>
                        </td>
                       @endif
                   </tr>
                   @endif

                @endforeach


               </tbody>




           </table>
                </div>
                <div class="tab-pane " id="nissan">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Nissan')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="mitsu">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Mitsu')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>
                <div class="tab-pane " id="suzuki">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Suzuki')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>
                <div class="tab-pane " id="isuzu">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Isuzu')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>
                <div class="tab-pane " id="honda">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Honda')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="dai">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Dai')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="hyun">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Hyun')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                <td style="color: rgb(95, 44, 130);"><strong>{{ $item -> nagoya}}</strong></td>



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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="Kia">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Kia')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="hitachi">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Hitachi')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                </div>

                <div class="tab-pane " id="mazda">

                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Mazda')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                    </div>

                <div class="tab-pane " id="other">
                    <table class="table table-bordered table-hover">


                        <thead>
                            <tr>
                             <th>NCR ID</th>

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

                            @foreach($items as $item)
                            @if($item->remark=='Other')
                            <tr>
                             <td>{{$item->ncr_id}}</td>

                                <td>{{ $item -> dx }}</td>
                                <td>{{ $item -> joka }}</td>
                                <td>{{ $item -> tk }}</td>
                                <td>{{ $item -> t_pic }}</td>
                                <td>{{ $item -> name }}</td>
                                <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                        <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                <td >
                                 <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                           <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                       </a>
                                 </td>
                                @endif
                            </tr>
                            @endif

                         @endforeach


                        </tbody>




                    </table>
                    </div>
                    <div class="tab-pane " id="condenser">

                        <table class="table table-bordered table-hover">


                            <thead>
                                <tr>
                                 <th>NCR ID</th>

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

                                @foreach($items as $item)
                                @if($item->remark=='Mazda')
                                <tr>
                                 <td>{{$item->ncr_id}}</td>

                                    <td>{{ $item -> dx }}</td>
                                    <td>{{ $item -> joka }}</td>
                                    <td>{{ $item -> tk }}</td>
                                    <td>{{ $item -> t_pic }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td><img src="{{ asset('/storage/app/public/photos/'. $item->photo) }}" style="width: 100px; height:100px;"/></td>
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
                                            <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                        </td>

                                    </form>
                                    <td >
                                     <a href="{{url('item/'.$item->id.'/foreign_order')}}" style="text-decoration: none;">
                                               <button class="btn btn-sm text-white" style="background: rgb(70, 9, 44);width:80px;"> <i class="fa fa-shopping-cart"></i>Foreign Order</button>
                                           </a>
                                     </td>
                                    @endif
                                </tr>
                                @endif

                             @endforeach


                            </tbody>




                        </table>
                        </div>
        </div>
    </div>



@endsection
