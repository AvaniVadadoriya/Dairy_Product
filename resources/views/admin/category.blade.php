@extends('admin/app')
@section('admin/body')

<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="margin-left:20px;">Category</h4>
                  
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin/insertcategory')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="cname" placeholder="Enter Category Name">
                      @error('cname') <span style="color:red;">{{$message}}</span> @enderror

                  </div>
                    <button type="submit" class="btn btn-primary mr-2">Add Category</button>
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
                  <h4 class="card-title">Category Table</h4>
                  {{session()->get('status')}}

                  <div class="table-responsive">
                    <table class="table table-striped responsive" id="ctable">
                      <thead>
                        <tr>
                          <th class="all">
                           No.
                          </th>
                          <th class="all">
                           Category Name
                          </th>
                          <th class="datatable-nosort">
                           Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($cate as $val)
                        <tr>
                          
                          <td>
                            {{$i++}}
                          </td>
                          <td>
                           {{$val->cname}}
                          </td>
                        

                          <td>
                  <a href="{{url('admin/fetchcategory')}}/{{$val->cid}}"> <img src="{{asset('Assets/admin')}}/images/Edit_Icon_48.png"></a>

                  <a href="{{url('admin/deletecategory')}}/{{$val->cid}}"> <img src="{{asset('Assets/admin')}}/images/Delete_Icon_48.png"></a>

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
  $('#ctable').DataTable();
});
</script>
@endsection