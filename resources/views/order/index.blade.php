@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">

            <form action="{{url('order')}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-1"></div>
            <div class="col-md-10 mb-5">


                <div class="card">
                <div class="card-header">
                    <h5>Radiator Order</h5>
                </div>
               <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Item Name</th>
                        {{-- <th>Item Name</th> --}}
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th><a href="#" class="btn btn-sm btn-success rounded-circle " id="add_more"><i class="fa fa-plus-circle"></i> </th>


                        </tr>
                    </thead>
                    <tbody class="AddMoreItem ">

                        <tr>
                            <td>1</td>
                            <td>
                                <select name="item_id[]" id="item_id" class="form-control item_id">
                                    @foreach($items as $item)
                                    <option
                                    data-price="{{$item->regular}}"
                                    data-name="{{$item->name}}"
                                   value="{{$item->id}}">{{$item->id}}</option>
                                    @endforeach
                                </select>

                            </td>

                            <td>
                                <input type="text" name="item_name[]" id="item_name" class="form-control item_name">
                            </td>
                            <td>
                                <input type="number" name="price[]" id="price" class="form-control price">
                            </td>
                            <td>
                                <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                            </td>

                            <td>
                                <input type="number" name="amount[]" id="amount" class="form-control amount">
                            </td>
                            <td><a href="#" class="btn btn-sm btn-danger rounded-circle  delete" ><i class="fa fa-times-circle"></i> </td>

                         {{-- <td>
                         <a href="{{url('order/'.$order->id.'/edit')}}" style="text-decoration: none;">
                         <button  class="btn btn-success btn-sm" > <i class="fa fa-edit"></i>  </button>
                         </a>

                         </td> --}}
                                {{-- <form action="{{ url('order/'.$order->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td>

                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i>  </button>
                                </td>

                            </form> --}}

                           </tr>

                    </tbody>


                </table>
               </div>
            </div>

            </div>
        </div>

            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tank Order</h5>
                        </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Tank Name</th>
                                {{-- <th>Item Name</th> --}}
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><a href="#" class="btn btn-sm btn-success rounded-circle " id="add_more_tank"><i class="fa fa-plus-circle"></i> </th>


                                </tr>
                            </thead>
                            <tbody class="AddMoreTank ">

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="tank_id[]" id="tank_id" class="form-control tank_id">
                                            @foreach($tanks as $tank)
                                            <option
                                            data-price="{{$tank->price}}"
                                            data-name="{{$tank->name}}"
                                           value="{{$tank->id}}">{{$tank->no}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    {{-- <td>
                                        <input type="text" name="name[]" class="form-control">
                                    </td> --}}
                                    <td>
                                        <input type="text" name="tank_name[]" id="tank_name" class="form-control tank_name">
                                    </td>
                                    <td>
                                        <input type="number" name="tank_price[]" id="tank_price" class="form-control  tank_price">
                                    </td>
                                    <td>
                                        <input type="number" name="tank_quantity[]" id="tank_quantity" class="form-control  tank_quantity">
                                    </td>

                                    <td>
                                        <input type="number" name="tank_amount[]" id="tank_amount" class="form-control  tank_amount">
                                    </td>


                                    <td><a href="#" class="btn btn-sm btn-danger rounded-circle  delete" ><i class="fa fa-times-circle"></i> </td>

                                 {{-- <td>
                                 <a href="{{url('order/'.$order->id.'/edit')}}" style="text-decoration: none;">
                                 <button  class="btn btn-success btn-sm" > <i class="fa fa-edit"></i>  </button>
                                 </a>

                                 </td> --}}
                                        {{-- <form action="{{ url('order/'.$order->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <td>

                                            <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i>  </button>
                                        </td>

                                    </form> --}}

                                   </tr>

                            </tbody>


                        </table>
                       </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
                <div class="card my-5">
                    <div class="card-header">
                        <h4>Total Amount <b class="total_amount">0.00 </b></h4>
                    </div>
                    <div class="card-body">
                        <div class="panel">
                            <div class="row">
                                <div class="form-group">
                                    <label for="date"> Date</label>
                                    <div class="col-md-12">
                                        <input type="date" name="date" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Customer Name </label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" id="" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="customer_type"> Customer type </label>
                                    <div class="col-md-12">
                                        <select  class="form-select" aria-label="Default select example" name="customer_type" >
                                            <option value="လက်ငင်း">လက်ငင်း</option>
                                            <option value="အကြွေး">အကြွေး </option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6    ">
                                    <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                                                       <input type="text" name="phone" class="form-control"
                                                        required >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="type"  class="mb-2 mt-2"> Type</label>
                                        <select  class="form-select" aria-label="Default select example" name="type" >
                                                       <option value="normal">Normal</option>
                                                       <option value="permanent">Permanent</option>
                                                       </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="shop"  class="mb-2 mt-2"> Shop</label>
                                            <select  class="form-select" aria-label="Default select example" name="shop" >
                                                           <option value="cnc">CNC</option>
                                                           <option value="ncr">NCR</option>
                                                           <option value="nagoya">Nagoya</option>

                                                           </select>
                                            </div>

                                     <div class="col-md-6">
                                      <div class="form-group">
                                    <label for="seller"  class="mb-2 mt-2">Seller Name</label>
                                    <textarea name="seller" class="form-control" ></textarea>

                                    </div>
                                     </div>

                                        <div class="col-md-6">
                                        <div class="form-group">
                                                           <label for="item"  class="mb-2 mt-2">Owner</label>
                                                           <textarea name="item" class="form-control" ></textarea>

                                                       </div>
                                        </div>

                                        <div>
                                            <button class="btn text-white form-control my-4" style="background: rgb(95, 44, 130);">Create Order</button>
                                            </button>
                                        </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>

        </form>

        </div>

    </div>

    </div>

@endsection

@section('script')
<script>
// $(document).ready(function(){
//     alert(1);
// })
    $('#add_more').on('click',function() {
        var item = $('#item_id').html();
        var numberofrow = ($('.AddMoreItem tr').length - 0 ) + 1 ;
        var tr = '<tr><td class "no"">' + numberofrow + '</td>' +
                        '<td> <select class="form-control item_id" name="item_id[]">' + item +
                        '</select> </td>' +
                        '<td> <input type= "text" name="item_name[]" class ="form-control item_name"> </td>'+
                        '<td> <input type= "number" name="price[]" class ="form-control price"> </td>'+
                        '<td> <input type= "number" name="quantity[]" class ="form-control quantity"> </td>'+
                        '<td> <input type= "number" name="amount[]" class ="form-control amount"> </td>'+
                        '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i> </a></td>'
                        $('.AddMoreItem').append(tr);

    })
    $('.AddMoreItem').delegate('.delete','click', function(){
        $(this).parent().parent().remove();
    })

    function TotalAmount(){
        var total=0;
        $('.amount').each(function(i,e){
            var amount = $(this).val() -0;
            total += amount;
        });
        var tank_total=0;
        $('.tank_amount').each(function(i,e){
            var tank_amount = $(this).val() -0;
            tank_total += tank_amount;
        });
        $('.total_amount').html(total+tank_total);

    }

    $('.AddMoreItem').delegate('.item_id','change',function(){
        var tr= $(this).parent().parent();
        var price = tr.find('.item_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var name = tr.find('.item_id option:selected').attr('data-name');
        tr.find('.item_name').val(name);

        var quantity = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (quantity * price);
        tr.find('.amount').val(total_amount);
        TotalAmount();
    })

    $('.AddMoreItem').delegate('.quantity','keyup',function(){
        var tr= $(this).parent().parent();

        var quantity = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (quantity * price) ;
        tr.find('.amount').val(total_amount);
        TotalAmount();
    })
////////////////////////////////////Tank Order////////////////////////////////////////////////////////////////


$('#add_more_tank').on('click',function() {
        var tank = $('#tank_id').html();
        var numberofrow = ($('.AddMoreTank tr').length - 0 ) + 1 ;
        var tr = '<tr><td class "no"">' + numberofrow + '</td>' +
                        '<td> <select class="form-control tank_id" name="tank_id[]">' + tank +
                        '</select> </td>' +
                        '<td> <input type= "text" name=" tank_name[]" class ="form-control  tank_name"> </td>'+
                        '<td> <input type= "number" name=" tank_price[]" class ="form-control  tank_price"> </td>'+
                        '<td> <input type= "number" name=" tank_quantity[]" class ="form-control  tank_quantity"> </td>'+
                        '<td> <input type= "number" name=" tank_amount[]" class ="form-control  tank_amount"> </td>'+
                        '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i> </a></td>'
                        $('.AddMoreTank').append(tr);

    })
    $('.AddMoreTank').delegate('.delete','click', function(){
        $(this).parent().parent().remove();
    })

    // function TotalAmount(){
    //     var total=0;
    //     $('.tank_amount').each(function(i,e){
    //         var amount = $(this).val() -0;
    //         total += amount;
    //     });
    //     $('.total_amount').html(total);
    // }

    $('.AddMoreTank').delegate('.tank_id','change',function(){
        var tr= $(this).parent().parent();
        var price = tr.find('.tank_id option:selected').attr('data-price');
        tr.find('.tank_price').val(price);
        var name = tr.find('.tank_id option:selected').attr('data-name');
        tr.find('.tank_name').val(name);


        var quantity = tr.find('.tank_quantity').val() - 0;
        var price = tr.find('.tank_price').val() - 0;
        var total_amount = (quantity * price);
        tr.find('.tank_amount').val(total_amount);
        TotalAmount();
    })

    $('.AddMoreTank').delegate('.tank_quantity','keyup',function(){
        var tr= $(this).parent().parent();

        var quantity = tr.find('.tank_quantity').val() - 0;
        var price = tr.find('.tank_price').val() - 0;
        var total_amount = (quantity * price) ;
        tr.find('.tank_amount').val(total_amount);
        TotalAmount();
    })

///////////////////////////////////////////////////////////////////
    </script>
@endsection


