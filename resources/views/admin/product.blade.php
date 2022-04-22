@extends('admin/app')
@section('admin/body')
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

</head>
<div class="main-panel">
  <div class="content-wrapper">
  
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="margin-left:20px;">Product</h4>
                

          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin/insertproduct')}}" method="post" enctype="multipart/form-data">
                      @csrf
                     
                    <div class="form-group">
                        <label for="cid">Select Category</label>
                          <select class="form-control" id="cid" name="cid">
                            <option>Select Category</option> 
                              @foreach($cate as $val)
                              <option value="{{$val->cid}}">{{$val->cname}}</option>
                              @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="s_c_id">Select Sub Category</label>
                        <select class="form-control" id="s_c_id" name="s_c_id">
                        <option>Select Sub Category</option> 
                            
                        @foreach($sub as $val)
                                <option value="{{$val->s_c_id}}">{{$val->scname}}</option>
                            @endforeach

                        </select>

                    </div> 

                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="pname" placeholder="Enter Product Name">
                      @error('pname') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                      @error('price') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                   
                    <div class="form-group">
                      <label for="size">Select Size</label>
                        <select class="form-control" id="size" name="size">
                          <option>Select Size</option> 
                            
                          @foreach($size as $s)
                            <option value="{{$s->size_id}}">{{$s->size_name}}</option>
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="brand" >Select  Brand</label>
                        <select class="form-control" id="brand" name="brand">
                          <option> Select Brand</option> 
                            
                          @foreach($brand as $b)
                            <option value="{{$b->brand_id}}">{{$b->brand_name}}</option>
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="flavour" >Select  Flavour</label>
                        <select class="form-control" id="flavour" name="flavour">
                          <option value="">Select Flavour</option> 
                            
                          @foreach($flavour as $f)
                            <option value="{{$f->flav_id}}">{{$f->flav_name}}</option>
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="packtype">Select Packtype</label>
                        <select class="form-control" id="packtype" name="packtype">
                          <option>Select Packtype</option> 
                            
                          @foreach($packtype as $p)
                            <option value="{{$p->pack_id}}">{{$p->pack_name}}</option>
                          @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                      <label for="mfg_date">Manufacturing Date</label>
                      <input type="date" class="form-control" id="mfg_date" name="mfg_date" placeholder="Enter Manufacturing Date">
                      @error('mfg_date') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                    <div class="form-group">
                      <label for="expire_date">Expiry Date</label>
                      <input type="date" class="form-control" id="expire_date" name="expire_date" placeholder="Enter Expiry Date">
                      @error('expire_date') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                   
                    <div class="form-group">
                      <label for="qty">Quantity</label>
                      <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity">
                      @error('qty') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                    
                    <div class="form-group">
                         
                      <label >Product Image</label>

                      <input type="file" class="form-control" id="image" name="image[]" multiple>
                      @error('image') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername2">Description</label>
                      <textarea  class="form-control" id="exampleInputUsername2" name="description" placeholder="Enter Description"></textarea>
                    </div>
                    @error('description') <span style="color:red">{{$message}}</span>  @enderror 

                    <div class="form-group">
                      <label for="exampleInputUsername2">Ingredients</label>
                      <textarea  class="form-control" id="exampleInputUsername2" name="ingredients" placeholder="Enter Ingredients"></textarea>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                    

                  </form>
                  
               
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" >Product List</h4>
                    {{session()->get('message')}}
                  <div class="table-responsive" >
                    <table class="table table-striped responsive " id="ptable" >
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="all">
                            Product Name
                          </th>
                          <th class="none">
                           Sub Category Id
                          </th>
                          <th class="none">
                           Brand
                          </th>
                          <th class="none">
                           Flavour
                          </th>
                          <th class="none">
                          Packtype
                          </th>
                          
                          <th class="none">
                            Description
                          </th>
                          <th class="datatable-nosort">
                           Action
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($product as $val)
                          @php  
                         
                       

                           $b = \DB::select('select * from brand where brand_id='.$val->brand_id)[0];
                           $p= \DB::select('select * from packtype where pack_id='.$val->pack_id)[0];
                           @endphp
                        <tr>
                          
                          <td>
                           {{$i++}}
                          </td>

                          <td>
                            {{$val->pname}}
                          </td>
                          <td>
                          {{$val->s_c_id}}
                          </td>
                          <td>
                          {{$b->brand_name}}
                          </td>
                         
                          <td>  
                            {{$val->flav_id}}
                          </td>

                          <td>
                          {{$p->pack_name}}
                          </td>
                         
                          <td>
                          {{$val->description}}
                          </td>
                        
                  <td>
                  <a href="{{url('admin/attribute')}}/{{$val->pid}}"> <img src="{{asset('Assets/admin')}}/images/addproduct.jpg"></a>

                  <a href="{{url('admin/fetchproduct')}}/{{$val->pid}}"> <img src="{{asset('Assets/admin')}}/images/Edit_Icon_48.png"></a>

                  <a href="{{url('admin/deleteproduct')}}/{{$val->pid}}"> <img src="{{asset('Assets/admin')}}/images/Delete_Icon_48.png"></a>

                  </td>
                       
                
                        
                  </tr>
                  @endforeach
                   
                 
                      
                      </tbody>
                    </table>
                  </div>
               
                  </div>
                  </div>
                  </div>



          

            </div>
           
            
       
	


@endsection

@section('admin/script')
<script src="{{asset('Assets/admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Assets/admin')}}/js/dataTables.responsive.min.js"></script>

<script>

$(document).ready(function(){
  $('#ptable').DataTable();
});
</script>

<script src="jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function(){
  $('#cid').change(function(){
     var c=$(this).val();
     
     $.ajax({
     url:"{{url('/admin/getsubcate')}}/"+c,
    success:function(result){
       $('#s_c_id').html(result);
       }
    });
    
  });
 });
  
</script>
@endsection


