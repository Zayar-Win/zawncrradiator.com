@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">

                    <form action="{{url ('debt/'.$debt->id) }}" method="POST"  >
                        @csrf
                        @method('PUT')



                          <div class="form-group">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <h4>Total Amount  <b class="total_amount">0 </b></h4>

                                </div>
                               <div class="card-body">
                                <table class="table table-bordered table-hover AddMoreItem">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Order ID</th>

                                            <th>Amount</th>
                                            <th>ပေးငွေ</th>
                                            <th>အကြွေးကျန်ငွေ</th>
                                            <th>Total</th>


                                            <th><a href="#" class="btn btn-sm btn-success rounded-circle " id="add_more"><i class="fa fa-plus-circle"></i> </th>


                                            </tr>
                                    </thead>
                                    <tbody class="">

                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <input type="date"  name="debt_date[]" id="debt_date" class="form-control debt_date">
                                            </td>
                                            <td>
                                                <input type="text"  name="item_id[]" id="item_id" class="form-control item_id">

                                            </td>

                                            <td>
                                                <input type="number"  name="price[]" id="price" class="form-control price">
                                            </td>
                                            <td>
                                                <input type="number" name="paid[]" id="paid" class="form-control paid">
                                            </td>


                                            <td>
                                                <input type="number" name="remaining_amount[]" id="remaining_amount" class="form-control remaining_amount">
                                                </td>
                                        <td>
                                            <input type="number" name="total[]" id="total" class="form-control total">
                                        </td>


                                            <td><a href="#" class="btn btn-sm btn-danger rounded-circle  delete" ><i class="fa fa-times-circle"></i> </td>


                                           </tr>

                                    </tbody>

                                </table>
                               </div>

                            </div>
                            <label for="total_amount"  class="mb-2 mt-2">Total Amount</label>
                            <input type="text" name="total_amount" class="form-control"  value="{{ $debt->total_amount ?? old('total_amount')}}"
                             required >
                        </div>

                        <div class="form-group">
                            <label for="date"  class="mb-2 mt-2">Date</label>
                            <input type="date" name="date" class="form-control"  value="{{ $debt->date ?? old('date')}}"
                             required >
                        </div>

                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">Name</label>
                            <input type="text" name="name" class="form-control"  value="{{ $debt->name ?? old('name')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                            <input type="text" name="phone" class="form-control"  value="{{ $debt->phone ?? old('phone')}}"
                             required >
                        </div>

                        <div class="form-group">
                            <label for="address"  class="mb-2 mt-2">Address </label>
                            <textarea name="address" rows="2" class="form-control" >{{ $debt->address ?? old('address')}}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="reason"  class="mb-2 mt-2">Reason </label>
                            <textarea name="reason" rows="2" class="form-control" >{{ $debt->reason ?? old('reason')}}</textarea>

                        </div>
                       <div class="mt-4">
                       <button class="btn btn-md text-white mb-5" style="background: rgb(95, 44, 130);">Update</button>
                       </div>
                    </form>

            </div>
            <div class="col-md-3"></div>
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

                        '<td> <input type= "date"  name="debt_date[]" class ="form-control debt_date"> </td>'+
                        '<td> <input type= "text"  name="item_id[]" class ="form-control item_id"> </td>'+
                        '<td> <input type= "number" name="price[]" class ="form-control price"> </td>'+
                        '<td> <input type= "number" name="paid[]" class ="form-control paid"> </td>'+
                        '<td> <input type= "hidden" name="remaining_amount[]" class ="form-control remaining_amount"> </td>'+
                        '<td> <input type= "number" name="total[]" class ="form-control total"> </td>'+

                        '<td> <a class="btn btn-danger btn-sm delete rounded-circle"><i class="fa fa-times-circle"></i> </a></td>'
                        $('.AddMoreItem').append(tr);

    })
    $('.AddMoreItem').delegate('.delete','click', function(){
        $(this).parent().parent().remove();
    })

    function TotalAmount(){
        var total=0;
        $('.total').each(function(i,e){
            var amount = $(this).val() -0;
            total += amount;
        });

        $('.total_amount').html(total);



    }

    // $('.AddMoreItem').delegate('.item_id','change',function(){
    //     var tr= $(this).parent().parent();
    //     var price = tr.find('.item_id option:selected').attr('data-price');
    //     tr.find('.price').val(price);
    //     var remaining_amount = tr.find('.remaining_amount').val();
    //     var paid = tr.find('.paid').val();
    //     var total_amount = ( price );
    //     tr.find('.total').val(total_amount);

    //     TotalAmount();

    // })
    $('.AddMoreItem').delegate('.price','keyup',function(){
        var tr= $(this).parent().parent();

        var remaining_amount = tr.find('.remaining_amount').val()  - 0;
        var price = tr.find('.price').val()  - 0;
        var total_amount = ( price +remaining_amount);
        tr.find('.total').val(total_amount);
        TotalAmount();
    })
    $('.AddMoreItem').delegate('.paid','keyup',function(){
        var tr= $(this).parent().parent();
        var remaining_amount = tr.find('.remaining_amount').val()  - 0;
        var paid = tr.find('.paid').val()  - 0;
        var price = tr.find('.price').val()  - 0;
        var total_amount = ( price + remaining_amount  - paid );
        tr.find('.total').val(total_amount);
        TotalAmount();
    })
    $('.AddMoreItem').delegate('.remaining_amount','keyup',function(){
        var tr= $(this).parent().parent();

        var remaining_amount = tr.find('.remaining_amount').val()  - 0;
        var price = tr.find('.price').val()  - 0;
        var total_amount = ( price + remaining_amount );
        tr.find('.total').val(total_amount);
        TotalAmount();
    })

    // $('.AddMoreItem').delegate('.remaining_amount','keyup',function(){
    //     var tr= $(this).parent().parent();
    //     var remaining_amount = tr.find('.remaining_amount').val() -0;
    //     var decrease = tr.find('.decrease').val() -0;
    //     var price = tr.find('.price').val() -0;
    //     var total_amount = ( price + remaining_amount );
    //     tr.find('.amount').val(total_amount);
    //     TotalAmount();
    // })
////////////////////////////////////Tank Order////////////////////////////////////////////////////////////////
</script>
@endsection
