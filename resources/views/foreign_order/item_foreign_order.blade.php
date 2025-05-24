@extends('layouts.template')
@section('content')
<!-- 1. BOOTSTRAP v4.0.0         CSS !-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- 3. BOOTSTRAP v4.0.0         JS !-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container mt-5">
<style>
#nav{
    height: 100%;
    display: inline-flex;
    flex-direction: row;
}
</style>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        <div>
            <ul class="nav nav-tabs" id="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#dx" data-toggle="tab">Dx</a>
                  </li>

                <li class="nav-item">
                  <a class="nav-link" href="#joka" data-toggle="tab">Joka</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tk" data-toggle="tab">Tk</a>
                  </li>
                </div>
                <div id='content' class="tab-content">
                    <div class="tab-pane active" id="dx">
                        <form action="{{url ('foreign_item_order_create') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                     <div class="card">
                         <div class="card-header text-black">
                            <h6> Dx Order</h6>
                         </div>
                         <div class="card-body text-dark">
                            <div class="row checkout-form">
                            <div class="col-md-12 mb-3 mx-5">
{{--
                            <div class="form-check form-switch">
                              <input class="form-check-input" name="photo" type="checkbox" value=" {{$item->photo}}" id="flexCheckDefault">

                             <label class="form-check-label mt-4" for="flexCheckDefault">
                               <img src="{{ asset('/storage/photos/'. $item->photo) }}" style="width: 400px; height:300px;"/>
                            </label>

                             </div> --}}
                            </div>
                              <div class="col-md-6 mb-3">
                              <label >Dx</label>
                              <div class="form-check form-switch">
                                 <input class="form-check-input" name="dx" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$item->dx}}
                                    </label>
                                     </div>
                                    </div>
                              <div class="col-md-6 mb-3">
                                 <label >Joka</label>
                         <div class="form-check form-switch">
                           <input class="form-check-input" name="joka" type="checkbox" value=" {{$item->joka}}" id="flexCheckDefault">
                             <label class="form-check-label" for="flexCheckDefault">
                                 {{$item->joka}}
                                              </label>
                                      </div>
                                  </div>
                                     <div class="col-md-6 mb-3">
                                     <label  >tk</label>
                                         <div class="form-check form-switch">
                                          <input class="form-check-input" name="tk" type="checkbox" value=" {{$item->tk}}" id="flexCheckDefault">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                             {{$item->tk}}
                                               </label>
                                         </div>
                                         </div>
                                         <div class="col-md-6 mb-3">
                                         <label  >Item Name</label>
                                         <div class="form-check form-switch">
                                         <input class="form-check-input" name="name" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                                         <label class="form-check-label" for="flexCheckDefault">
                                               {{$item->name}}
                                                      </label>
                                                  </div>
                                              </div>

                                         <div class="col-md-6 mb-3">
                                        <label  >PA/TA/MT</label>
                                    <div class="form-check form-switch">
                                     <input class="form-check-input" name="pa" type="checkbox" value=" {{$item->pa}}" id="flexCheckDefault">
                                          <label class="form-check-label" for="flexCheckDefault">
                                                {{$item->pa}}
                                                    </label>
                                              </div>
                                         </div>
                                  <div class="col-md-6 mb-3">
                                              <label  >Size</label>
                                      <div class="form-check form-switch">
                                        <input class="form-check-input" name="size" type="checkbox" value=" {{$item->size}}" id="flexCheckDefault">
                                          <label class="form-check-label" for="flexCheckDefault">
                                            {{$item->size}}
                                        </label>
                                          </div>
                                       </div>
                                          <div class="col-md-6 mb-3">
                                             <label  >High</label>
                                        <div class="form-check form-switch">
                                           <input class="form-check-input" name="high" type="checkbox" value=" {{$item->high}}" id="flexCheckDefault">
                                                   <label class="form-check-label" for="flexCheckDefault">
                                                  {{$item->high}}
                                                   </label>
                                            </div>
                                                   </div>
                                                  <div class="col-md-6 mb-3">
                                             <label  >Regular (1)</label>
                                            <div class="form-check form-switch">
                                                   <input class="form-check-input" name="regular" type="checkbox" value=" {{$item->regular}}" id="flexCheckDefault">
                                               <label class="form-check-label" for="flexCheckDefault">
                                                    {{$item->regular}}
                                                          </label>
                                                </div>
                                               </div>
                                          <div class="col-md-6 mb-3">
                                          <label  >Two Piece (2)</label>
                                         <div class="form-check form-switch">
                                        <input class="form-check-input" name="two_piece" type="checkbox" value=" {{$item->two_piece}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                            {{$item->two_piece}}
                                                       </label>
                                                              </div>
                                            </div>
                                      <div class="col-md-6 mb-3">
                                          <label  >Three Piece (3)</label>
                                                  <div class="form-check form-switch">
                                            <input class="form-check-input" name="three_piece" type="checkbox" value=" {{$item->three_piece}}" id="flexCheckDefault">
                                           <label class="form-check-label" for="flexCheckDefault">
                                          {{$item->three_piece}}
                                                </label>
                                           </div>
                                            </div>



                                      <div class="col-md-6 mb-3">
                                         <label  >Dx Price</label>
                                            <div class="form-check form-switch">
                                         <input class="form-check-input" name="dx_price" type="checkbox" value=" {{$item->dx_price}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                        {{$item->dx_price}}
                                                     </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                     <label  >Joka Price</label>
                                                        <div class="form-check form-switch">
                                                     <input class="form-check-input" name="joka_price" type="checkbox" value=" {{$item->joka_price}}" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                    {{$item->joka_price}}
                                                                 </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                 <label  >Tk Price</label>
                                                                    <div class="form-check form-switch">
                                                                 <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                                {{$item->tk_price}}
                                                                             </label>
                                                                                </div>
                                                                            </div>

                             <div class="col-md-6 mb-3">
                           <label  >Tk Price</label>
                          <div class="form-check form-switch">
                           <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                         <label class="form-check-label" for="flexCheckDefault">
                             {{$item->tk_price}}
                                 </label>
                           </div>

                               </div>
                               <div class="col-md-6 mb-3">
                                 <label  >Dx MM Price</label>
                                <div class="form-check form-switch">
                                 <input class="form-check-input" name="dx_mm" type="checkbox" value=" {{$item->dx_mm}}" id="flexCheckDefault">
                               <label class="form-check-label" for="flexCheckDefault">
                                   {{$item->dx_mm}}
                                       </label>
                                 </div>
                                     </div>

                                     <div class="col-md-6 mb-3">
                                         <label  >Joka MM Price</label>
                                        <div class="form-check form-switch">
                                         <input class="form-check-input" name="joka_mm" type="checkbox" value=" {{$item->joka_mm}}" id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">
                                           {{$item->joka_mm}}
                                               </label>
                                         </div>
                                             </div>

                                             <div class="col-md-6 mb-3">
                                                 <label  >TK MM Price</label>
                                                <div class="form-check form-switch">
                                                 <input class="form-check-input" name="tk_mm" type="checkbox" value=" {{$item->tk_mm}}" id="flexCheckDefault">
                                               <label class="form-check-label" for="flexCheckDefault">
                                                   {{$item->tk_mm}}
                                                       </label>
                                                 </div>
                                                     </div>

                                                     <div class="col-md-6 mb-3">
                                                         <label  >CBM</label>
                                                        <div class="form-check form-switch">
                                                         <input class="form-check-input" name="cbm" type="checkbox" value=" {{$item->cbm}}" id="flexCheckDefault">
                                                       <label class="form-check-label" for="flexCheckDefault">
                                                           {{$item->cbm}}
                                                               </label>
                                                         </div>
                                                             </div>
                                                             <div class="col-md-6 mb-3">
                                                                 <label  >Fixed Quantity</label>
                                                                <div class="form-check form-switch">
                                                                 <input class="form-check-input" name="fixed_quantity" type="checkbox" value=" {{$item->fixed_quantity}}" id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                   {{$item->fixed_quantity}}
                                                                       </label>
                                                                 </div>
                                                                     </div>
                                                                     <div class="col-md-6 mb-3">
                                                                         <label  >Remark</label>
                                                                        <div class="form-check form-switch">
                                                                         <input class="form-check-input" name="remark" type="checkbox" value=" {{$item->remark}}" id="flexCheckDefault">
                                                                       <label class="form-check-label" for="flexCheckDefault">
                                                                           {{$item->remark}}
                                                                               </label>
                                                                         </div>

                                                                             </div>
                                                                             <div class="col-md-6 mb-3">

                                                                                <div class="form-group">
                                                                             <label for="quantity"  class="mb-2 mt-2">Quantity </label>
                                                                            <input type="number" name="quantity" class="form-control" >
                                                                 </div>
                                                        </div>
                                                                             <div class="mt-4 ">
                                                                                 <button class="btn text-white form-control" style="background: rgb(70, 9, 44);">Create Order</button>
                                                                                    </div>


                                                              </div>
                         </div>
                     </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="joka">
                        <form action="{{url ('foreign_joka_order_create') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                        <div class="card">
                            <div class="card-header text-black">
                               <h6>Joka Order</h6>
                            </div>
                            <div class="card-body text-dark">
                               <div class="row checkout-form">
                               <div class="col-md-12 mb-3 mx-5">

                               {{-- <div class="form-check form-switch">
                                 <input class="form-check-input" name="photo" type="checkbox" value=" {{$item->photo}}" id="flexCheckDefault">

                                <label class="form-check-label mt-4" for="flexCheckDefault">
                                  <img src="{{ asset('/storage/photos/'. $item->photo) }}" style="width: 400px; height:300px;"/>
                               </label>

                                </div> --}}
                               </div>
                                 <div class="col-md-6 mb-3">
                                 <label >Dx</label>
                                 <div class="form-check form-switch">
                                    <input class="form-check-input" name="dx" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                                   <label class="form-check-label" for="flexCheckDefault">
                                       {{$item->dx}}
                                       </label>
                                        </div>
                                       </div>
                                 <div class="col-md-6 mb-3">
                                    <label >Joka</label>
                            <div class="form-check form-switch">
                              <input class="form-check-input" name="joka" type="checkbox" value=" {{$item->joka}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$item->joka}}
                                                 </label>
                                         </div>
                                     </div>
                                        <div class="col-md-6 mb-3">
                                        <label  >tk</label>
                                            <div class="form-check form-switch">
                                             <input class="form-check-input" name="tk" type="checkbox" value=" {{$item->tk}}" id="flexCheckDefault">
                                                         <label class="form-check-label" for="flexCheckDefault">
                                                                {{$item->tk}}
                                                  </label>
                                            </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                            <label  >Item Name</label>
                                            <div class="form-check form-switch">
                                            <input class="form-check-input" name="name" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                  {{$item->name}}
                                                         </label>
                                                     </div>
                                                 </div>

                                            <div class="col-md-6 mb-3">
                                           <label  >PA/TA/MT</label>
                                       <div class="form-check form-switch">
                                        <input class="form-check-input" name="pa" type="checkbox" value=" {{$item->pa}}" id="flexCheckDefault">
                                             <label class="form-check-label" for="flexCheckDefault">
                                                   {{$item->pa}}
                                                       </label>
                                                 </div>
                                            </div>
                                     <div class="col-md-6 mb-3">
                                                 <label  >Size</label>
                                         <div class="form-check form-switch">
                                           <input class="form-check-input" name="size" type="checkbox" value=" {{$item->size}}" id="flexCheckDefault">
                                             <label class="form-check-label" for="flexCheckDefault">
                                               {{$item->size}}
                                           </label>
                                             </div>
                                          </div>
                                             <div class="col-md-6 mb-3">
                                                <label  >High</label>
                                           <div class="form-check form-switch">
                                              <input class="form-check-input" name="high" type="checkbox" value=" {{$item->high}}" id="flexCheckDefault">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                     {{$item->high}}
                                                      </label>
                                               </div>
                                                      </div>
                                                     <div class="col-md-6 mb-3">
                                                <label  >Regular (1)</label>
                                               <div class="form-check form-switch">
                                                      <input class="form-check-input" name="regular" type="checkbox" value=" {{$item->regular}}" id="flexCheckDefault">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                       {{$item->regular}}
                                                             </label>
                                                   </div>
                                                  </div>
                                             <div class="col-md-6 mb-3">
                                             <label  >Two Piece (2)</label>
                                            <div class="form-check form-switch">
                                           <input class="form-check-input" name="two_piece" type="checkbox" value=" {{$item->two_piece}}" id="flexCheckDefault">
                                                   <label class="form-check-label" for="flexCheckDefault">
                                                               {{$item->two_piece}}
                                                          </label>
                                                                 </div>
                                               </div>
                                         <div class="col-md-6 mb-3">
                                             <label  >Three Piece (3)</label>
                                                     <div class="form-check form-switch">
                                               <input class="form-check-input" name="three_piece" type="checkbox" value=" {{$item->three_piece}}" id="flexCheckDefault">
                                              <label class="form-check-label" for="flexCheckDefault">
                                             {{$item->three_piece}}
                                                   </label>
                                              </div>
                                               </div>



                                         <div class="col-md-6 mb-3">
                                            <label  >Dx Price</label>
                                               <div class="form-check form-switch">
                                            <input class="form-check-input" name="dx_price" type="checkbox" value=" {{$item->dx_price}}" id="flexCheckDefault">
                                               <label class="form-check-label" for="flexCheckDefault">
                                                           {{$item->dx_price}}
                                                        </label>
                                                           </div>
                                                       </div>

                                                       <div class="col-md-6 mb-3">
                                                        <label  >Joka Price</label>
                                                           <div class="form-check form-switch">
                                                        <input class="form-check-input" name="joka_price" type="checkbox" value=" {{$item->joka_price}}" id="flexCheckDefault">
                                                           <label class="form-check-label" for="flexCheckDefault">
                                                                       {{$item->joka_price}}
                                                                    </label>
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-md-6 mb-3">
                                                                    <label  >Tk Price</label>
                                                                       <div class="form-check form-switch">
                                                                    <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                                                                       <label class="form-check-label" for="flexCheckDefault">
                                                                                   {{$item->tk_price}}
                                                                                </label>
                                                                                   </div>
                                                                               </div>

                                <div class="col-md-6 mb-3">
                              <label  >Tk Price</label>
                             <div class="form-check form-switch">
                              <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$item->tk_price}}
                                    </label>
                              </div>

                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label  >Dx MM Price</label>
                                   <div class="form-check form-switch">
                                    <input class="form-check-input" name="dx_mm" type="checkbox" value=" {{$item->dx_mm}}" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                      {{$item->dx_mm}}
                                          </label>
                                    </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label  >Joka MM Price</label>
                                           <div class="form-check form-switch">
                                            <input class="form-check-input" name="joka_mm" type="checkbox" value=" {{$item->joka_mm}}" id="flexCheckDefault">
                                          <label class="form-check-label" for="flexCheckDefault">
                                              {{$item->joka_mm}}
                                                  </label>
                                            </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label  >TK MM Price</label>
                                                   <div class="form-check form-switch">
                                                    <input class="form-check-input" name="tk_mm" type="checkbox" value=" {{$item->tk_mm}}" id="flexCheckDefault">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                      {{$item->tk_mm}}
                                                          </label>
                                                    </div>
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label  >CBM</label>
                                                           <div class="form-check form-switch">
                                                            <input class="form-check-input" name="cbm" type="checkbox" value=" {{$item->cbm}}" id="flexCheckDefault">
                                                          <label class="form-check-label" for="flexCheckDefault">
                                                              {{$item->cbm}}
                                                                  </label>
                                                            </div>
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label  >Fixed Quantity</label>
                                                                   <div class="form-check form-switch">
                                                                    <input class="form-check-input" name="fixed_quantity" type="checkbox" value=" {{$item->fixed_quantity}}" id="flexCheckDefault">
                                                                  <label class="form-check-label" for="flexCheckDefault">
                                                                      {{$item->fixed_quantity}}
                                                                          </label>
                                                                    </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label  >Remark</label>
                                                                           <div class="form-check form-switch">
                                                                            <input class="form-check-input" name="remark" type="checkbox" value=" {{$item->remark}}" id="flexCheckDefault">
                                                                          <label class="form-check-label" for="flexCheckDefault">
                                                                              {{$item->remark}}
                                                                                  </label>
                                                                            </div>
                                                                                </div>
                                                                                <div class="col-md-6 mb-3">

                                                                                    <div class="form-group">
                                                                                 <label for="quantity"  class="mb-2 mt-2">Quantity </label>
                                                                                <input type="number" name="quantity" class="form-control" >
                                                                     </div>
                                                                                                                               </div>
                                                                                <div class="mt-4 ">
                                                                                    <button class="btn text-white form-control" style="background: rgb(70, 9, 44);">Create Order</button>
                                                                                       </div>


                                                                 </div>
                            </div>
                        </div>
                        </form>
                </div>

                <div class="tab-pane " id="tk">
                    <form action="{{url ('foreign_tk_order_create') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                    <div class="card">
                        <div class="card-header text-black">
                           <h6>Tk Order</h6>
                        </div>
                        <div class="card-body text-dark">
                           <div class="row checkout-form">
                           <div class="col-md-12 mb-3 mx-5">

                           {{-- <div class="form-check form-switch">
                             <input class="form-check-input" name="photo" type="checkbox" value=" {{$item->photo}}" id="flexCheckDefault">

                            <label class="form-check-label mt-4" for="flexCheckDefault">
                              <img src="{{ asset('/storage/photos/'. $item->photo) }}" style="width: 400px; height:300px;"/>
                           </label>

                            </div> --}}
                           </div>
                             <div class="col-md-6 mb-3">
                             <label >Dx</label>
                             <div class="form-check form-switch">
                                <input class="form-check-input" name="dx" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                               <label class="form-check-label" for="flexCheckDefault">
                                   {{$item->dx}}
                                   </label>
                                    </div>
                                   </div>
                             <div class="col-md-6 mb-3">
                                <label >Joka</label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" name="joka" type="checkbox" value=" {{$item->joka}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$item->joka}}
                                             </label>
                                     </div>
                                 </div>
                                    <div class="col-md-6 mb-3">
                                    <label  >tk</label>
                                        <div class="form-check form-switch">
                                         <input class="form-check-input" name="tk" type="checkbox" value=" {{$item->tk}}" id="flexCheckDefault">
                                                     <label class="form-check-label" for="flexCheckDefault">
                                                            {{$item->tk}}
                                              </label>
                                        </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                        <label  >Item Name</label>
                                        <div class="form-check form-switch">
                                        <input class="form-check-input" name="name" type="checkbox" value=" {{$item->dx}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                              {{$item->name}}
                                                     </label>
                                                 </div>
                                             </div>

                                        <div class="col-md-6 mb-3">
                                       <label  >PA/TA/MT</label>
                                   <div class="form-check form-switch">
                                    <input class="form-check-input" name="pa" type="checkbox" value=" {{$item->pa}}" id="flexCheckDefault">
                                         <label class="form-check-label" for="flexCheckDefault">
                                               {{$item->pa}}
                                                   </label>
                                             </div>
                                        </div>
                                 <div class="col-md-6 mb-3">
                                             <label  >Size</label>
                                     <div class="form-check form-switch">
                                       <input class="form-check-input" name="size" type="checkbox" value=" {{$item->size}}" id="flexCheckDefault">
                                         <label class="form-check-label" for="flexCheckDefault">
                                           {{$item->size}}
                                       </label>
                                         </div>
                                      </div>
                                         <div class="col-md-6 mb-3">
                                            <label  >High</label>
                                       <div class="form-check form-switch">
                                          <input class="form-check-input" name="high" type="checkbox" value=" {{$item->high}}" id="flexCheckDefault">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                 {{$item->high}}
                                                  </label>
                                           </div>
                                                  </div>
                                                 <div class="col-md-6 mb-3">
                                            <label  >Regular (1)</label>
                                           <div class="form-check form-switch">
                                                  <input class="form-check-input" name="regular" type="checkbox" value=" {{$item->regular}}" id="flexCheckDefault">
                                              <label class="form-check-label" for="flexCheckDefault">
                                                   {{$item->regular}}
                                                         </label>
                                               </div>
                                              </div>
                                         <div class="col-md-6 mb-3">
                                         <label  >Two Piece (2)</label>
                                        <div class="form-check form-switch">
                                       <input class="form-check-input" name="two_piece" type="checkbox" value=" {{$item->two_piece}}" id="flexCheckDefault">
                                               <label class="form-check-label" for="flexCheckDefault">
                                                           {{$item->two_piece}}
                                                      </label>
                                                             </div>
                                           </div>
                                     <div class="col-md-6 mb-3">
                                         <label  >Three Piece (3)</label>
                                                 <div class="form-check form-switch">
                                           <input class="form-check-input" name="three_piece" type="checkbox" value=" {{$item->three_piece}}" id="flexCheckDefault">
                                          <label class="form-check-label" for="flexCheckDefault">
                                         {{$item->three_piece}}
                                               </label>
                                          </div>
                                           </div>


                                     <div class="col-md-6 mb-3">
                                        <label  >Dx Price</label>
                                           <div class="form-check form-switch">
                                        <input class="form-check-input" name="dx_price" type="checkbox" value=" {{$item->dx_price}}" id="flexCheckDefault">
                                           <label class="form-check-label" for="flexCheckDefault">
                                                       {{$item->dx_price}}
                                                    </label>
                                                       </div>
                                                   </div>

                                                   <div class="col-md-6 mb-3">
                                                    <label  >Joka Price</label>
                                                       <div class="form-check form-switch">
                                                    <input class="form-check-input" name="joka_price" type="checkbox" value=" {{$item->joka_price}}" id="flexCheckDefault">
                                                       <label class="form-check-label" for="flexCheckDefault">
                                                                   {{$item->joka_price}}
                                                                </label>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-6 mb-3">
                                                                <label  >Tk Price</label>
                                                                   <div class="form-check form-switch">
                                                                <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                                                                   <label class="form-check-label" for="flexCheckDefault">
                                                                               {{$item->tk_price}}
                                                                            </label>
                                                                               </div>
                                                                           </div>

                            <div class="col-md-6 mb-3">
                          <label  >Tk Price</label>
                         <div class="form-check form-switch">
                          <input class="form-check-input" name="tk_price" type="checkbox" value=" {{$item->tk_price}}" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$item->tk_price}}
                                </label>
                          </div>

                              </div>
                              <div class="col-md-6 mb-3">
                                <label  >Dx MM Price</label>
                               <div class="form-check form-switch">
                                <input class="form-check-input" name="dx_mm" type="checkbox" value=" {{$item->dx_mm}}" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                  {{$item->dx_mm}}
                                      </label>
                                </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label  >Joka MM Price</label>
                                       <div class="form-check form-switch">
                                        <input class="form-check-input" name="joka_mm" type="checkbox" value=" {{$item->joka_mm}}" id="flexCheckDefault">
                                      <label class="form-check-label" for="flexCheckDefault">
                                          {{$item->joka_mm}}
                                              </label>
                                        </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label  >TK MM Price</label>
                                               <div class="form-check form-switch">
                                                <input class="form-check-input" name="tk_mm" type="checkbox" value=" {{$item->tk_mm}}" id="flexCheckDefault">
                                              <label class="form-check-label" for="flexCheckDefault">
                                                  {{$item->tk_mm}}
                                                      </label>
                                                </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label  >CBM</label>
                                                       <div class="form-check form-switch">
                                                        <input class="form-check-input" name="cbm" type="checkbox" value=" {{$item->cbm}}" id="flexCheckDefault">
                                                      <label class="form-check-label" for="flexCheckDefault">
                                                          {{$item->cbm}}
                                                              </label>
                                                        </div>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label  >Fixed Quantity</label>
                                                               <div class="form-check form-switch">
                                                                <input class="form-check-input" name="fixed_quantity" type="checkbox" value=" {{$item->fixed_quantity}}" id="flexCheckDefault">
                                                              <label class="form-check-label" for="flexCheckDefault">
                                                                  {{$item->fixed_quantity}}
                                                                      </label>
                                                                </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label  >Remark</label>
                                                                       <div class="form-check form-switch">
                                                                        <input class="form-check-input" name="remark" type="checkbox" value=" {{$item->remark}}" id="flexCheckDefault">
                                                                      <label class="form-check-label" for="flexCheckDefault">
                                                                          {{$item->remark}}
                                                                              </label>
                                                                        </div>
                                                                            </div>s
                                                                            <div class="col-md-6 mb-3">

                                                                                <div class="form-group">
                                                                             <label for="quantity"  class="mb-2 mt-2">Quantity </label>
                                                                            <input type="number" name="quantity" class="form-control" >
                                                                 </div>
                                                                                                                           </div>
                                                                            <div class="mt-4 ">
                                                                                <button class="btn text-white form-control" style="background: rgb(70, 9, 44);">Create Order</button>
                                                                                   </div>


                                                             </div>
                        </div>
                    </div>
                    </form>
            </div>

    </div>
</div>
@endsection
