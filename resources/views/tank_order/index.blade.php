@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-7">



               <a href="{{route('tank_order.create')}}" >
                   <button class="btn btn-sm text-white mb-2" style="background: rgb(95, 44, 130);">
                       <i class="fa fa-plus-circle"></i> Add New
                   </button>
               </a>
               <form action="{{url('tank_order')}}" method="post">
                @csrf

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
                        <th><a href="#" class="btn btn-sm btn-success rounded-circle " id="add_more"><i class="fa fa-plus-circle"></i> </th>


                        </tr>
                    </thead>
                    <tbody class="AddMoreItem ">

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
                                <input type="text" name="tank_name[]" id="tname" class="form-control tname">
                            </td>
                            <td>
                                <input type="number" name="tprice[]" id="tprice" class="form-control tprice">
                            </td>
                            <td>
                                <input type="number" name="tquantity[]" id="tquantity" class="form-control tquantity">
                            </td>

                            <td>
                                <input type="number" name="tamount[]" id="tamount" class="form-control tamount">
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
            <div class="col-md-4">
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
                                            <option value="pay">Pay</option>
                                            <option value="debt">Debt</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6    ">
                                    <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                                                       <input type="text" name="phone" class="form-control"
                                                        required >
                                    </div> <div class="col-md-6">
                                        <label for="type"  class="mb-2 mt-2"> Type</label>
                                        <select  class="form-select" aria-label="Default select example" name="type" >
                                                       <option value="normal">Normal</option>
                                                       <option value="permanent">Permanent</option>
                                                       </select>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                           <label for="item"  class="mb-2 mt-2">Item</label>
                                                           <textarea name="item" rows="1" class="form-control" ></textarea>

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
        var item = $('#tank_id').html();
        var numberofrow = ($('.AddMoreItem tr').length - 0 ) + 1 ;
        var tr = '<tr><td class "no"">' + numberofrow + '</td>' +
                        '<td> <select class="form-control tank_id" name="tank_id[]">' + item +
                        '</select> </td>' +
                        '<td> <input type= "text" name="tname[]" class ="form-control tname"> </td>'+
                        '<td> <input type= "number" name="tprice[]" class ="form-control tprice"> </td>'+
                        '<td> <input type= "number" name="tquantity[]" class ="form-control tquantity"> </td>'+
                        '<td> <input type= "number" name="tamount[]" class ="form-control tamount"> </td>'+
                        '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i> </a></td>'
                        $('.AddMoreItem').append(tr);

    })
    $('.AddMoreItem').delegate('.delete','click', function(){
        $(this).parent().parent().remove();
    })

    function TotalAmount(){
        var total=0;
        $('.tamount').each(function(i,e){
            var amount = $(this).val() -0;
            total += amount;
        });
        $('.total_amount').html(total);
    }

    $('.AddMoreItem').delegate('.tank_id','change',function(){
        var tr= $(this).parent().parent();
        var price = tr.find('.tank_id option:selected').attr('data-price');
        tr.find('.tprice').val(price);
        var name = tr.find('.tank_id option:selected').attr('data-name');
        tr.find('.tname').val(name);

        var quantity = tr.find('.tquantity').val() - 0;
        var price = tr.find('.tprice').val() - 0;
        var total_amount = (quantity * price);
        tr.find('.tamount').val(total_amount);
        TotalAmount();
    })

    $('.AddMoreItem').delegate('.tquantity','keyup',function(){
        var tr= $(this).parent().parent();

        var quantity = tr.find('.tquantity').val() - 0;
        var price = tr.find('.tprice').val() - 0;
        var total_amount = (quantity * price) ;
        tr.find('.tamount').val(total_amount);
        TotalAmount();
    })

    </script>
@endsection


