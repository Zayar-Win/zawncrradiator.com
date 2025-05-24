@extends('layouts.template')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                    <form action="{{url ('item') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="ncr_id" class="mb-2">NCR ID</label>
                            <input type="text"  name="ncr_id" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="dx" class="mb-2">Dx</label>
                            <input type="text"  name="dx" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="joka" class="mb-2 mt-2">Joka</label>
                            <input type="text" name="joka" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="t_pic"  class="mb-2 mt-2">T Pic</label>
                            <input type="text" name="t_pic" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="tk"  class="mb-2 mt-2">TK</label>
                            <input type="text" name="tk" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">Item Name</label>
                            <input type="text" name="name" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="photo"  class="mb-2 mt-2">Photo</label>
                            <input type="file" name="photo" class="form-control"  >
                        </div>
                        <div class="form-group">
                            <label for="pa"  class="mb-2 mt-2">PA/TA/MT</label>
                            <input type="text" name="pa" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="size"  class="mb-2 mt-2">Size</label>
                            <input type="text" name="size" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="high"  class="mb-2 mt-2">High</label>
                            <input type="text" name="high" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="regular"  class="mb-2 mt-2">Regular (1)</label>
                            <input type="text" name="regular" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="two_piece"  class="mb-2 mt-2">Two Piece (2)</label>
                            <input type="text" name="two_piece" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="three_piece"  class="mb-2 mt-2">Three Piece (3)</label>
                            <input type="text" name="three_piece" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="fixed_quantity"  class="mb-2 mt-2">Fixed Quantity</label>
                            <input type="number" name="fixed_quantity" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="quantity"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="quantity" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="cnc_quantity"  class="mb-2 mt-2">CNC Quantity</label>
                            <input type="number" name="cnc_quantity" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="nagoya_quantity"  class="mb-2 mt-2">Nagoya Quantity</label>
                            <input type="number" name="nagoya_quantity" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="dx_price"  class="mb-2 mt-2">Dx Price</label>
                            <input type="text" name="dx_price" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="joka_price"  class="mb-2 mt-2">Joka Price</label>
                            <input type="text" name="joka_price" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="tk_price"  class="mb-2 mt-2">Tk Price</label>
                            <input type="text" name="tk_price" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="t_pic_price"  class="mb-2 mt-2">T Pic Price</label>
                            <input type="text" name="t_pic_price" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="dx_mm"  class="mb-2 mt-2">Dx Myanmar Price</label>
                            <input type="text" name="dx_mm" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="joka_mm"  class="mb-2 mt-2">Joka Myanmar Price</label>
                            <input type="text" name="joka_mm" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="tk_mm"  class="mb-2 mt-2">Tk Myanmar Price</label>
                            <input type="text" name="tk_mm" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="t_pic_mm"  class="mb-2 mt-2">T Pic Myanmar Price</label>
                            <input type="text" name="t_pic_mm" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="cbm"  class="mb-2 mt-2">CBM</label>
                            <input type="text" name="cbm" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="roll_grade"  class="mb-2 mt-2">Roll Grade</label>
                            <input type="text" name="roll_grade" class="form-control"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="remark"  class="mb-2 mt-2">Remark</label>
                            <textarea name="remark" rows="2" class="form-control" ></textarea>

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
