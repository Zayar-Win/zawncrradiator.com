@extends('layouts.template')
@section('content')

<link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=oursunicode' />

    <style>

#print_card{

    font-family:'Ours-Unicode';
}
@media print {
    body *{
        visibility: hidden;
    }
 #print-container, #print-container *{
     visibility: visible;
 }
 #print-container {
     position: absolute;
     left : 0px;
     top: 0px;
     font-family:'Ours-Unicode';

 }
}

        </style>

     <div class="row">
           <div class="col-md-2"></div>
           <div class="col-md-10" >

           <div class="row  justify-content-center "  >


                <div class="col-md-11">
                <div class="card ">
                    <div  id="print-container" >
                    <div  class="card-header">
                        <div class="row mb-4 ">
                        <h1 class="text-center">NCR</h1>
                        <h4 class="text-center">NEW COMPLETE RADIATOR CO.LTD</h4>
                        <h6 class="text-center text-danger"> <strong>NAGOYA:NCR (Managing Director: Zaw Wan) </strong></h6>
                        </div>
                        ရုံကြီး (ခ/၄၀)|အခန်း (၂၂)|ဘုရင့်နောင်စျေးပတ်လမ်း <br>
                        ရုံကြီး (ခ/၁၄)|အခန်း (၂၅)|ဘုရင့်နောင်စျေးကြီး|မရမ်းကုန်းမြို့နယ်|ရန်ကုန်<br>
                        <div class="row row-cols-2 mt-2"  >
                            <div class="col-md-6">
                            Viber :09 440070073,09 426660007,09 421039788<br>
                             Phone :09 420026417,09 450051114,09 250072930,09 971139024 <br>
                            </div>
                            <div class="col-md-6">
                          <h6 class="text-danger"> AYA Bank - 0016224010006290 <h6>
                          <h6 class="text-danger">KBZ Bank- 12030100500443101 <h6>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row row-cols-2"  >
                            @foreach ( $orders as $order )

                            <div class="col-md-5">


                                <div class="card-body">

                           <h6>Name - {{$order->name}} </h6>
                            <h6>Phone - {{$order->phone}} </h6>
                            <h6>Type - {{$order->customer_type}} </h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                           <h6>     Date - {{$order->date}} </h6>
                            <h6>    Invoice - {{$order->id}} </h6>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    <table  class="table table-bordered table-hover mt-4 ">

<tr>


    <th><h6>Item Name</h6></th>
    <th><h6>Price</h6></th>
    <th><h6>Quantity</h6></th>
    <th><h6>Amount</h6></th>

    </tr>

    @foreach ($order_details as $order )
    <tr>

        <td><h6>{{$order->name}}</h6></td>
        <td><h6>{{$order->price}}</h6></td>
        <td><h6>{{$order->quantity}}</h6></td>
        <td><h6>{{$order->amount}}</h6></td>


    </tr>
    @endforeach


<tr>
    <td></td>
    <td></td>


    <td><h6>Total</h6></td>
    <td><h6>{{number_format($order_details->sum('amount'),2)}}</h6> </td>
</tr>
                    </table>
                </div>
                <h6 class="float-end my-4 mx-5" > Signature </h6>
                    </div>




                    <div class="table-footer" id="footer">

                  <button class="btn btn-sm btn-dark float-end my-4 mx-4 " id="print"
                  onclick="window.print()"  > <i class="fa fa-print"></i></button>

                 </div>





                </div>
                </div>


    </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



@endsection
