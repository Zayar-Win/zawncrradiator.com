@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">

                    <form action="{{url ('debt') }}" method="POST"  >
                        @csrf

                        <div class="form-group">
                            <label for="date"  class="mb-2 mt-2">Date</label>
                            <input type="date" name="date" class="form-control"
                             required >
                        </div>

                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">Name</label>
                            <input type="text" name="name" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="phone"  class="mb-2 mt-2">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                             required >
                        </div>

                        <div class="form-group">
                            <label for="address"  class="mb-2 mt-2">Address </label>
                            <textarea name="address" rows="2" class="form-control" ></textarea>

                        </div>
                        <div class="form-group">
                            <label for="reason"  class="mb-2 mt-2">Reason </label>
                            <textarea name="reason" rows="2" class="form-control" ></textarea>

                        </div>
                       <div class="mt-4">
                       <button class="btn btn-md text-white mb-5" style="background: rgb(95, 44, 130);">Create</button>
                       </div>
                    </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
