@extends('admin/app')
@section('admin/body')






<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"  style="margin-left:20px;">Edit/Update Product</h4>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin')}}/updateproduct/{{$product->pid}}" method="post" enctype="multipart/form-data">
                      @csrf
                     
                      <div class="form-group">
                      <label for="cid">Select Category</label>

                      <select class="form-control" id="cid" name="cid">
                        
                          @foreach($cate as $val)
                            @if($val->cid == $product->cid)
                                <option value="{{$val->cid}}" selected>{{$val->cname}}</option>
                                @else
                               
                                    <option value="{{$val->cid}}">{{$val->cname}}</option>

                              
                            @endif
                           @endforeach
                          
                        </select> 
                      </div>
                      <div class="form-group">
                      <label for="s_c_id">Select Sub Category</label>

                      <select class="form-control" id="s_c_id" name="s_c_id">
                     
                        @foreach($sub as $val) 
                        @if($val->s_c_id == $product->s_c_id)
                                <option value="{{$val->s_c_id}}" selected>{{$val->scname}}</option>
                          @else
                          <option value="{{$val->s_c_id}}" >{{$val->scname}}</option>

                           @endif  
                           @endforeach
                        </select>
                      </div> 
                    
                  <div class="form-group">
                      <label for="exampleInputUsername1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="pname" value="{{$product->pname}}">
                    </div>
                   
                   
                 
                    <div class="form-group">
                      <label for="brand" >Select  Brand</label>
                        <select class="form-control" id="brand" name="brand">
                          <option> Select Brand</option> 
                            
                          @foreach($brand as $b)
                          
                            @if($b->brand_id == $product->brand_id)
                              <option value="{{$b->brand_id}}" selected>{{$b->brand_name}}</option>
                              @else
                              <option value="{{$b->brand_id}}">{{$b->brand_name}}</option>

                            @endif  
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="flavour">Select  Flavour</label>
                        <select class="form-control" id="flavour" name="flavour">
                          <option value="0">Select Flavour</option> 
                            
                          @foreach($flavour as $f)
                          @if($f->flav_id == $product->flav_id)
                            <option value="{{$f->flav_id}}" selected>{{$f->flav_name}}</option>
                          @else
                          <option value="{{$f->flav_id}}">{{$f->flav_name}}</option>
                          @endif 
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="packtype">Select Packtype</label>
                        <select class="form-control" id="packtype" name="packtype">
                          <option>Select Packtype</option> 
                            
                          @foreach($packtype as $p)
                            @if($p->pack_id == $product->pack_id)
                              <option value="{{$p->pack_id}}" selected>{{$p->pack_name}}</option>
                              @else
                              <option value="{{$p->pack_id}}">{{$p->pack_name}}</option>
                            @endif 
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="qty">Quantity</label>
                      <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" value="{{$product->qty}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername2">Description</label>
                      <textarea  class="form-control" id="exampleInputUsername2" name="description" >{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername2">Ingredients</label>
                      <textarea  class="form-control" id="exampleInputUsername2" name="ingredients">{{$product->ingredients}}</textarea>
                    </div>

                    <div class="form-group "> 
                      <button  type="button" class="btn btn-light mr-2 add"  name="submit">+Add Image</button>
                    </div>
                        <div  class="append" style="padding-left:20px;">

                        </div>
    

                    <div class="col-xl-2 d-flex grid-margin stretch-card">
                        @foreach($images as $key=>$val)
                          <div class="card">
                                      <center><img src="{{asset('Assets')}}/img/product/{{$val->url}}" alt="" style="height:100px;width:100px;margin:10px;"></center>
                          </div>
                          
                          <div>
                          <a href="{{url('admin/deleteimage')}}/{{$val->i_id}}"><button type="button" class="btn btn-light" style="margin:20px;margin-top:35px">Delete</button></a>
                          </div>
                    
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Edit Product</button>
                    

                  </form>
                  
               
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
          </div> 
            
       
	


@endsection

@section('admin/script')


<script>
  $(document).ready(function(){
        $('.add').click(function(){
            $('.append').append('<div class="row " >\
            <form action="{{url('admin/addimage')}}/{{$product->pid}}" method="post" enctype="multipart/form-data"> \
            @csrf\
                        <div class="form-group col-xl-12" style="display:inline;">\
                        <label for="exampleInputUsername1">Product Image</label>\
                          <input type="file" class="form-control" id="exampleInputUsername1" name="image[]" multiple >\
                          <button type="submit" class="btn btn-light mr-2" style="margin:20px;">Add</button>\
                        </div>\
                        </div>\
          </form>');

                });
              
  });
          </script>


@endsection
