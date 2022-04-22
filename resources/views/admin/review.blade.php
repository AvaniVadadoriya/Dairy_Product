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
                  <h4 class="card-title">Review</h4>

                  <div class="table-responsive" >
                    <table class="table table-striped responsive" id="rtable" >
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="all">
                           Rating
                          </th>
                          <th class="all">
                           Review Message
                          </th >
                          <th class="all" >
                          Review Date
                          </th>
                          <th class="all" >
                          Username
                          </th>
                          
                          <th class="all">
                          product Name
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                          @php $i=1; @endphp
                     @foreach($review as $val)
                       @php 
                        $a=\DB::select('select * from product where product.pid = '.$val->pid)[0];
                       @endphp
                        <tr>
                         
                          <td>
                          {{$i++}} 
                          </td>
                          <td>
                          {{$val->rating}}
                          </td>
                          <td>
                          {{$val->review}}
                          </td>
                          <td>
                          {{$val->r_date}}
                          </td>
                          <td>
                          {{$val->uname}}
                          </td>
                         
                          <td>
                          {{$a->pname}}
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
  $('#rtable').DataTable();
});
</script>
@endsection