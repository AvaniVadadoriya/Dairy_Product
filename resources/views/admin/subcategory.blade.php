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
                  <h4 class="card-title" style="margin-left:20px;">Sub Category</h4>
                  
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('admin/insertsubcategory')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="cid">
                        <option>Select Category</option> 
                        @foreach($cate as $val)
                            
                            <option value="{{$val->cid}}">{{$val->cname}}</option>
                           @endforeach

                        </select>
                      </div>
                  <div class="form-group">
                      <label for="exampleInputUsername1">Sub Category Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="scname" placeholder="Enter Sub Category Name">
                      @error('scname') <span style="color:red;">{{$message}}</span> @enderror

                  </div>
                    

                   
                    <button type="submit" class="btn btn-primary mr-2">Add Sub Category</button>
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
                  <h4 class="card-title">Sub Category Table</h4>
                  {{session()->get('status')}}

                  <div class="table-responsive">
                    <table class="table table-striped responsive" id="stable">
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="none">
                            Category Id
                          </th>
                          <th class="all">
                            Sub Category Name
                          </th>
                          </th>
                          <th class="datatable-nosort">
                           Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                      @foreach($subcategory as $val)
                      <tr>
                          
                          <td>
                            {{$i++}}
                          </td>
                          <td>
                            {{$val->cid}}
                          </td>
                          <td>
                          {{$val->scname}}
                          </td>
                          <!-- <td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="{{url('admin/deletesubcategory')}}/{{$val->s_c_id}}"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td> -->
                  <!-- <td><a class="badge badge-success" href="{{url('admin/editsubcategory')}}/{{$val->s_c_id}}" style="margin:2px">Edit</a>
                          <a class="badge badge-danger" href="{{url('admin/deletesubcategory')}}/{{$val->s_c_id}}" style="margin:2px">Delete</a></td> -->
                          <td>
                  <a href="{{url('admin/fetchsubcategory')}}/{{$val->s_c_id}}" > <img src="{{asset('Assets/admin')}}/images/Edit_Icon_48.png"></a>

                  <a href="{{url('admin/deletesubcategory')}}/{{$val->s_c_id}}" > <img src="{{asset('Assets/admin')}}/images/Delete_Icon_48.png"></a>

                  </td>
                        </tr>
                       @endforeach
                        
                      </tbody>
                    </table>
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
  $('#stable').DataTable();
});
</script>
@endsection