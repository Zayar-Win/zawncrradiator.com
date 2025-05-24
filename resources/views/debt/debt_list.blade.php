    @extends('layouts.template')
    @section('content')

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11" >




                        <table  class="table table-bordered table-hover">
                            <thead>
    <tr>

        <th>Date</th>
        <th>Order ID</th>
        <th>ယူငွေ</th>
        <th>ပေးငွေ</th>
        <th>အကြွေးကျန်ငွေ</th>
        <th>လက်ကျန်ငွေ</th>
        <th>Action</th>

        </tr>
            </thead>
                            <tbody id="tbody">

        @foreach ($debt_lists as $debt )
        <tr>

            <td>{{$debt->debt_date}}</td>
            <td>{{$debt->order_id}}</td>
            <td>{{number_format($debt->amount)}}</td>
            <td class="text-success">{{number_format($debt->paid_amount)}}</td>
            <td class="text-danger">{{number_format($debt->remaining_amount)}}</td>
            <td>{{$debt->total}}</td>
            <td>  <form action="{{ url('debt/'.$debt->id.'/delete') }}" method="POST">
                @method('DELETE')
                @csrf

                    <button  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"> </i> Delete  </button>


            </form></td>

        </tr>
        @endforeach

    {{-- <tr>
        <td></td>
        <td></td>
        <td></td>

        <td class="text-success"> <strong>Total</strong></td>
        <td class="text-success"><strong>{{number_format($debt_lists->sum('total'),2)}}</strong></td>
    </tr> --}}

                            </tbody>

                        </table>


                        </div>

                    </div>
                    </div>


        </div>
        </div>
    </div>
    </div>
    @endsection



    {{-- @section('script')
    <script>

    </script>

    @endsection --}}
