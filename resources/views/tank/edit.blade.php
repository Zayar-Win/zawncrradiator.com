@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                    <form action="{{url ('tank/'.$tank->id) }}" method="POST" enctype="multipart/form-data" >  
                    @method('PUT')       
                        @csrf
                        <div class="form-group">
                            <label for="no" class="mb-2">No</label>
                            <input type="text"  name="no" class="form-control"  value="{{ $tank->no ?? old('no')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="narye_code" class="mb-2 mt-2">NarYe Code</label>
                            <input type="text" name="narye_code" class="form-control"  value="{{ $tank->narye_code ?? old('narye_code')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="code"  class="mb-2 mt-2">Howyang</label>
                            <input type="text" name="code" class="form-control" value="{{ $tank->code ?? old('code')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="pipe_size"  class="mb-2 mt-2">Pipe size</label>
                            <input type="text" name="pipe_size" class="form-control" value="{{ $tank->pipe_size ?? old('pipe_size')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">name</label>
                            <input type="text" name="name" class="form-control"  value="{{ $tank->name ?? old('name')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="photo"  class="mb-2 mt-2">Photo</label>
                            <input type="file" name="photo" class="form-control"  >
                        </div>
                     
                        <div class="form-group">
                            <label for="up_down"  class="mb-2 mt-2">Up/Down</label>
                            <input type="text" name="up_down" class="form-control" value="{{ $tank->up_down ?? old('up_down')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="tank"  class="mb-2 mt-2">Tank Size</label>
                            <input type="text" name="tank" class="form-control" value="{{ $tank->tank ?? old('tank')}}"
                             required >
                        </div>
                      
                      
                       
                        
                        <div class="form-group">
                            <label for="quantity"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{ $tank->quantity ?? old('quantity')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="fixed_quantity"  class="mb-2 mt-2">Fixed Quantity</label>
                            <input type="number" name="fixed_quantity" class="form-control" value="{{ $tank->fixed_quantity ?? old('fixed_quantity')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="price"  class="mb-2 mt-2"> Price</label>
                            <input type="number" name="price" class="form-control"  value="{{ $tank->price ?? old('price')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="narye_code_price"  class="mb-2 mt-2">NarYe Code Price</label>
                            <input type="text" name="narye_code_price" class="form-control" value="{{ $tank->narye_code_price ?? old('narye_code_price')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="code_price"  class="mb-2 mt-2">Howyang Price</label>
                            <input type="text" name="code_price" class="form-control" value="{{ $tank->code_price ?? old('code_price')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="narye_mm"  class="mb-2 mt-2">Narye FOB Myanmar Price</label>
                            <input type="text" name="narye_mm" class="form-control"  value="{{ $tank->narye_mm ?? old('narye_mm')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="code_mm"  class="mb-2 mt-2">Howyang FOB Price</label>
                            <input type="text" name="code_mm" class="form-control"  value="{{ $tank->code_mm ?? old('code_mm')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="code_price"  class="mb-2 mt-2">Remark </label>
                            <input type="text" name="remark" class="form-control" value="{{ $tank->remark ?? old('remark')}}"
                             required >
                        </div>
                       <div class="mt-4">
                    <button class="btn btn-md text-white mb-5" style="background: rgb(95, 44, 130);">Update Tank</button>
                       </div>
                    </form>
        
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection