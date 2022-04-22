@extends('admin/app')
@section('admin/body')


<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

     
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="margin-left:20px;">Edit/Update Brand</h4>
                  
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin')}}/updatebrand/{{$brand->brand_id}}"  method="post" enctype="multipart/form-data">
                      @csrf
                    
                  <div class="form-group">
                      <label for="exampleInputUsername1">Brand Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="brand_name" value="{{$brand->brand_name}}">
                    </div>
                    

                   
                    <button type="submit" class="btn btn-primary mr-2">Edit Brand</button>
                  </form>
                </div>
              </div>
            </div>

          

            </div>
            </div>
            </div>
            </div>
@endsection

