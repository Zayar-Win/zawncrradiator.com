@extends('layouts.template')
@section('content')

<div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">



          <div class="card">
            <div class="card-header text-center">
                <h5>Photo</h5>
            </div>
            <div class="card-body bg-dark text-center">
                <img src="{{ asset('/storage/Message/'. $message->photo)}}" style="width:auto; height:350px;"/>
            </div>

          </div>
            </div>

        </div>
    </div>



@endsection
