@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                
                    <form action="{{url ('daily_usage') }}" method="POST"  >      
                        @csrf
                       
                        <div class="form-group">
                            <label for="date"  class="mb-2 mt-2">Date</label>
                            <input type="date" name="date" class="form-control" 
                             required >
                        </div>
                        <div class="form-group">
                            <label for="daily_usage"  class="mb-2 mt-2">Daily Usage</label>
                            <textarea name="daily_usage" rows="13" class="form-control" ></textarea>
                            
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