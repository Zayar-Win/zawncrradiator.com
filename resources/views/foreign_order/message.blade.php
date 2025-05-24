@extends('layouts.template')
@section('content')


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-9">


                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>Name</th>

                            <th>Title</th>
                            <th>Message</th>
                            <th>Photo</th>
                            <th>Deposit</th>
                            <th>Total</th>
                            <th>Date Of Departures</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($message as $msg )
                        <tr>
                            <td>  {{$msg->name}}</td>
                            <td>  {{$msg->title}}</td>
                            <td>  {{$msg->message}}</td>
                            <td><img src="{{ asset('/storage/Message/'. $msg->photo) }}"
                                style="width: 100px; height:70px;"/></td>
                                <td>{{$msg->deposit}}</td>
                                <td>{{$msg->total}}</td>
                                <td>{{$msg->dod}}</td>
                                <td>
                                    <a href="{{url('message_photo/'.$msg->id)}}" style="text-decoration: none;">
                                        <button class="btn btn-dark btn-sm"><i class="fa fa-search"></i></button>
                                    </a>

                                <form action="{{ url('message_delete/'.$msg->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <td>
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"> <i class="fa fa-trash"></i></button>
                                    </td>

                                </form>
                                </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

    </div>
</div>
@endsection
