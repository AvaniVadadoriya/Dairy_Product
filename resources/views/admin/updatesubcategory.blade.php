@extends('admin/app')
@section('admin/body')


<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

     
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"  style="margin-left:20px;">Edit/Update Sub Category</h4>
                  
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin')}}/updatesubcategory/{{$sub->s_c_id}}"  method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Category</label>
                        <select class="form-control " id="exampleFormControlSelect1" name="cid">

                        @foreach($category as $val)
                        @if($val->cid==$sub->cid)

                            <option value="{{$val->cid}}" selected>{{$val->cname}}</option>
                        @else
                            <option value="{{$val->cid}}">{{$val->cname}}</option>
                            @endif
                           @endforeach
                        </select>
                      </div>
                  <div class="form-group">
                      <label for="exampleInputUsername1">Sub Category Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="scname" value="{{$sub->scname}}">
                    </div>
                    

                   
                    <button type="submit" class="btn btn-primary mr-2">Edit Sub Category</button>
                  </form>
                </div>
              </div>
            </div>

          

            </div>
            </div>
            </div>
            </div>
@endsection

