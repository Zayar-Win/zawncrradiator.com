@extends('layouts.template')
@section('content')

<div class="container mt-5">



     <div class="row">
           <div class="col-md-1"></div>
           <div class="col-md-11" >

           <div class="row row-cols-1 row-cols-md-6 g-2 mt-2 justify-content-center "  >


                <div class="col-md-10 px-3 m-2 py-3">
                <div class="card ">
                    <div  class="card-header">
                        <div class="row mb-4">
                        <h1 class="text-center">NCR</h1>
                        <h4 class="text-center">NEW COMPLETE RADIATOR CO.LTD</h4>
                        <h6 class="text-center text-danger"> <strong>NAGOYA:NCR (Managing Director: Zaw Wan) </strong></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-7">

                            ရုံကြီး (ခ/၄၀)| အခန်း (၂၂) | ဘုရင့်နောင်စျေးပတ်လမ်း <br>
                            ရုံကြီး (ခ/၁၄) | အခန်း (၂၅) | ဘုရင့်နောင်စျေးကြီး | မရမ်းကုန်းမြို့နယ် |  ရန်ကုန်မြို့ <br>
                            <strong>Viber : 09 440070073, 09 426660007, 09 421039788</strong>
                            <strong> Phone : 09 420026417, 09 450051114, 09 250072930, 09 971139024 </strong>
                            </div>
                            <div class="col-md-5">
                            <strong> Bank Account Name</strong><br>
                            <strong> Ko Zaw Wan</strong> <br>
                          <h6 class="text-danger"><strong> AYA Bank - 0016224010006290 </strong> <h6>
                          <h6 class="text-danger"><strong> KBZ Bank- 12030100500443101 <strong> <h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                    <table  class="table table-bordered table-hover">
<tr>

    <th>Date</th>
    <th>Customer Type</th>
    <th>Customer Name</th>
    <th>tank</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Amount</th>

    </tr>
    @foreach ($order_receipt as $order )
    <tr>

        <td>{{$order->tank_order->date}}</td>
        <td>{{$order->tank_order->customer_type}}</td>
        <td>{{$order->tank_order->name}}</td>
        <td>{{$order->tank->name}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->amount}}</td>


    </tr>
    @endforeach


<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Total</td>
    <td>{{number_format($order_receipt->sum('amount'),2)}}</td>
</tr>
                    </table>


                    <div class="table-footer" id="footer">

                  <button class="btn  btn-sm text-white float-end py-2  " id="print"  style="background: rgb(95, 44, 130); border-radius:20px"  > <i class="fa fa-print"></i> Generate Print</button>

                 </div>

                 {{-- <div class="btn-group float-end py-2">
                     <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark">
                        <i class="fa fa-print"></i>Print

                     </button>
                 </div> --}}

                    </div>

                </div>
                </div>


    </div>
    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">
  $('#print').on('click', function() {
$('#footer').hide();
window.print();
});
    // function PrintReceiptContent(el){
    //     var data = '<input type="button" id="printPageButton' + 'class="printPageButton" style="display:block; ' +
    //                     'width="100%"; border:none; cursor:pointer; '+ 'value="Print Receipt" onClick="window.print()">';
    //                     data +=document.getElementById(el).innerHTML;
    // }
  </script>

@endsection
