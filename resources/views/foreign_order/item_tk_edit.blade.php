@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                    <form action="{{url ('foreign_tk_view/'.$item->id.'/update') }}" method="POST" enctype="multipart/form-data" >
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="ncr_id" class="mb-2">NCR ID</label>
                            <input type="text"  name="ncr_id" class="form-control"  value="{{ $item->ncr_id ?? old('ncr_id')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="dx" class="mb-2">Dx</label>
                            <input type="text"  name="dx" class="form-control"  value="{{ $item->dx ?? old('dx')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="joka" class="mb-2 mt-2">Joka</label>
                            <input type="text" name="joka" class="form-control" value="{{ $item->joka ?? old('joka')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="tk"  class="mb-2 mt-2">TK</label>
                            <input type="text" name="tk" class="form-control" value="{{ $item->tk ?? old('tk')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">Item Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $item->name ?? old('name')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="photo"  class="mb-2 mt-2">Photo</label>
                            <input type="file" name="photo" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="pa"  class="mb-2 mt-2">PA/TA/MT</label>
                            <input type="text" name="pa" class="form-control" value="{{ $item->pa ?? old('pa')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="size"  class="mb-2 mt-2">Size</label>
                            <input type="text" name="size" class="form-control" value="{{ $item->size ?? old('size')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="high"  class="mb-2 mt-2">High</label>
                            <input type="text" name="high" class="form-control" value="{{ $item->high ?? old('high')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="regular"  class="mb-2 mt-2">Regular (1)</label>
                            <input type="text" name="regular" class="form-control"  value="{{ $item->regular ?? old('regular')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="two_piece"  class="mb-2 mt-2">Two Piece (2)</label>
                            <input type="text" name="two_piece" class="form-control"  value="{{ $item->two_piece ?? old('two_piece')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="three_piece"  class="mb-2 mt-2">Three Piece (3)</label>
                            <input type="text" name="three_piece" class="form-control"  value="{{ $item->three_piece ?? old('three_piece')}}"
                              >
                        </div>

                        <div class="form-group">
                            <label for="quantity"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="quantity" class="form-control"  value="{{ $item->quantity ?? old('quantity')}}"
                              >
                        </div>

                        <div class="form-group">
                            <label for="fixed_quantity"  class="mb-2 mt-2">Fixed Quantity</label>
                            <input type="number" name="fixed_quantity" class="form-control"  value="{{ $item->fixed_quantity ?? old('fixed_quantity')}}"
                              >
                        </div>

                        <div class="form-group">
                            <label for="dx_price"  class="mb-2 mt-2">Dx Price</label>
                            <input type="text" name="dx_price" class="form-control"  value="{{ $item->dx_price ?? old('dx_price')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="joka_price"  class="mb-2 mt-2">Joka Price</label>
                            <input type="text" name="joka_price" class="form-control" value="{{ $item->joka_price ?? old('joka_price')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="tk_price"  class="mb-2 mt-2">Tk Price</label>
                            <input type="text" name="tk_price" class="form-control" value="{{ $item->tk_price ?? old('tk_price')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="dx_mm"  class="mb-2 mt-2">Dx Myanmar Price</label>
                            <input type="text" name="dx_mm" class="form-control" value="{{ $item->dx_mm ?? old('dx_mm')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="joka_mm"  class="mb-2 mt-2">Joka Myanmar Price</label>
                            <input type="text" name="joka_mm" class="form-control" value="{{ $item->joka_mm ?? old('joka_mm')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="tk_mm"  class="mb-2 mt-2">Tk Myanmar Price</label>
                            <input type="text" name="tk_mm" class="form-control" value="{{ $item->tk_mm ?? old('tk_mm')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="cbm"  class="mb-2 mt-2">CBM</label>
                            <input type="text" name="cbm" class="form-control" value="{{ $item->cbm ?? old('cbm')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="roll_grade"  class="mb-2 mt-2">Roll Grade</label>
                            <input type="text" name="roll_grade" class="form-control" value="{{ $item->roll_grade ?? old('roll_grade')}}"
                              >
                        </div>
                        <div class="form-group">
                            <label for="remark"  class="mb-2 mt-2">Remark</label>
                            <textarea name="remark" rows="2" class="form-control" >{{$item->remark ?? old('remark')}}</textarea>

                        </div>

                       <div class="mt-4">
                       <button class="btn btn-md text-white mb-5" style="background: rgb(95, 44, 130);">Update Item</button>
                       </div>
                    </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
