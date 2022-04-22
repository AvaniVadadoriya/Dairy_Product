@extends('admin/app')
@section('admin/body')
<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

<div class="main-panel">
<div class="content-wrapper">


<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User List</h4>

                  <div class="table-responsive" >
                    <table class="table table-striped responsive" id="utable" >
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="all">
                           User Name
                          </th>
                          <th class="all">
                           Phone
                          </th >
                          <th class="all" >
                           Email
                          </th>
                           
                          <th class="none">
                          Date of Birth
                          </th>
                          <th class="all">
                          Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @php $i=1; @endphp
                     @foreach($userlist as $val)
                       
                        <tr>
                         
                          <td>
                          {{$i++}} 
                          </td>
                          <td>
                          {{$val->uname}}
                          </td>
                          <td>
                          {{$val->phone}}
                          </td>
                          <td>
                          {{$val->email}}
                          </td>
                         
                          <td>
                          {{$val->dob}}
                          </td>
                          <td>
                         
                            @if(session()->get('user.uid')== $val->uid)
                          
                              <label class="badge badge-success">Active</label>
                            
                            @else
                              <label class="badge badge-danger">Deactive</label>
                            
                             
                            @endif
                          
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
  $('#utable').DataTable();
});
</script>
@endsection