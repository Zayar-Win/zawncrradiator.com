
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
 integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                    <form action="{{url ('user/'.$item->id) }}" method="POST" enctype="multipart/form-data" > 
                        @method('PUT')     
                        @csrf
                        <div class="form-group">
                            <label for="dx" class="mb-2">Dx</label>
                            <input type="text"  name="dx" class="form-control"  value="{{ $item->dx ?? old('dx')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="joka" class="mb-2 mt-2">Joka</label>
                            <input type="text" name="joka" class="form-control" value="{{ $item->joka ?? old('joka')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="tk"  class="mb-2 mt-2">TK</label>
                            <input type="text" name="tk" class="form-control" value="{{ $item->tk ?? old('tk')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="name"  class="mb-2 mt-2">Item Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $item->name ?? old('name')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="photo"  class="mb-2 mt-2">Photo</label>
                            <input type="file" name="photo" class="form-control" disabled >
                        </div>
                        <div class="form-group">
                            <label for="pa"  class="mb-2 mt-2">PA/TA/MT</label>
                            <input type="text" name="pa" class="form-control" value="{{ $item->pa ?? old('pa')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="size"  class="mb-2 mt-2">Size</label>
                            <input type="text" name="size" class="form-control" value="{{ $item->size ?? old('size')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="high"  class="mb-2 mt-2">High</label>
                            <input type="text" name="high" class="form-control" value="{{ $item->high ?? old('high')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="regular"  class="mb-2 mt-2">Regular (1)</label>
                            <input type="text" name="regular" class="form-control"  value="{{ $item->regular ?? old('regular')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="two_piece"  class="mb-2 mt-2">Two Piece (2)</label>
                            <input type="text" name="two_piece" class="form-control"  value="{{ $item->two_piece ?? old('two_piece')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="three_piece"  class="mb-2 mt-2">Three Piece (3)</label>
                            <input type="text" name="three_piece" class="form-control"  value="{{ $item->three_piece ?? old('three_piece')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="fixed_quantity"  class="mb-2 mt-2">Fixed Quantity</label>
                            <input type="number" name="fixed_quantity" class="form-control"  value="{{ $item->fixed_quantity ?? old('fixed_quantity')}}"
                         disabled >
                        </div>
                        <div class="form-group">
                            <label for="quantity"  class="mb-2 mt-2">Quantity</label>
                            <input type="number" name="quantity" class="form-control"  value="{{ $item->quantity ?? old('quantity')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="price"  class="mb-2 mt-2">Price</label>
                            <input type="number" name="price" class="form-control"  value="{{ $item->price ?? old('price')}}"
                             required >
                        </div>
                        <div class="form-group">
                            <label for="remark"  class="mb-2 mt-2">Remark</label>
                            <textarea name="remark" rows="2" class="form-control" >{{$item->remark ?? old('remark')}}</textarea>
                            
                        </div>
                       <div class="mt-4">
                    <button class="btn btn-primary">Update Item</button>
                       </div>
                    </form>
        
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

