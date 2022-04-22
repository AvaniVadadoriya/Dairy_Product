@extends('deliveryboy/app')
@section('deliveryboy/body')
<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

<div class="main-panel">
<div class="content-wrapper">



<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order List</h4>

                  <div class="table-responsive" >
                    <table class="table table-striped responsive" id="otable" >
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="all">
                             Name
                          </th>
                          <th class="all">
                            Order_Date
                          </th>
                          <th class="all">
                         Address
                          </th>
                          <th class="all">
                         City
                          </th>
                          <th class="all">
                         Pincode
                          </th>
                          <th class="all">
                         Email
                          </th>
                          <th class="all">
                         Phone
                          </th>
                        
                         
                          <th class="all" >
                           Amount
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          @php $i=1; @endphp
                         
                    @foreach($userregistration as $userregistration) 
                       
                        <tr>
                            
                            <td>
                                {{$i++}} 
                            </td>

                            <td>
                                {{$userregistration->o_name}}
                            </td>

                            <td>
                                {{$userregistration->o_date}}
                            </td>
                            <td>
                                {{$userregistration->address}}
                            </td>
                            <td>
                                {{$userregistration->city}}
                            </td>
                            <td>
                                {{$userregistration->pincode}}
                            </td>
                            <td>
                                {{$userregistration->o_email}}
                            </td>
                            <td>
                                {{$userregistration->o_phone}}
                            </td>
                            

                            <td>
                                {{$userregistration->amount}}
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
@section('deliveryboy/script')
<script src="{{asset('Assets/admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Assets/admin')}}/js/dataTables.responsive.min.js"></script>

<script>

$(document).ready(function(){
  $('#otable').DataTable();

 


});



</script>
@endsection