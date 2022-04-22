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
                          <th class="none">
                           Order Id
                          </th >
                          <th class="all" >
                           Amount
                          </th>
                          <th class="none">
                           Coupon Code
                          </th >
                          <th class="all">
                           Phone No.
                          </th >
                          <th class="all">
                           Email
                          </th >
                          <th class="all">
                           Address
                          </th >
                          <th class="none">
                           City
                          </th >
                          <th class="none">
                           Pincode
                          </th >
                          <th class="none">
                          Discount
                          </th> 
                         
                          <th class="none">
                          Order Date
                          </th> 
                          <th class="none">
                          DeliveryBoy Id
                          </th> 
                          <th class="all">
                          Order Status
                          </th>
                          <th class="all">
                          Operation
                          </th>
                          <th class="all">
                          Invoice
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          @php $i=1; @endphp
                     @foreach($order as $val)
                       
                        <tr>
                         
                          <td>
                          {{$i++}} 
                          </td>
                          <td>
                          {{$val->o_name}}
                          </td>
                          <td>
                          {{$val->o_id}}
                          </td>
                          
                            
                          <td>
                          {{$val->amount}}
                          </td>
                          <td>
                          {{$val->code}}
                          </td>
                          <td>
                          {{$val->o_phone}}
                          </td>
                          <td>
                          {{$val->o_email}}
                          </td>
                            
                         
                            
                          <td>
                          {{$val->address}}
                          </td>
                            
                          <td>
                          {{$val->city}}
                          </td>
                          <td>
                          {{$val->pincode}}
                          </td>
                          <td>
                          {{$val->discount}}
                          </td>
                            
                          
                          <td>
                          {{$val->o_date}}
                          </td>
                          <td>
                          {{$val->d_b_id}}
                          </td>

                          <td>
                            @if($val->o_status == 0)
                                <label class="badge badge-success">Placed </label>

                            @elseif($val->o_status == 1)    
                                 <label class="badge badge-info">Processing</label>

                            @elseif($val->o_status == 2)
                                <label class="badge badge-danger">Shipped</label>

                            @elseif($val->o_status == 3)
                                <label class="badge badge-warning">Deliver</label>

                            @endif
                          
                          </td>
                          
                          <td>
                            @if($val->o_status == 0)
                              <a href="{{url('admin/chandeorderstatus')}}/{{$val->o_id}}/1" >  
                                Processing
                              </a>
                            @elseif($val->o_status == 1)
                              <a data-toggle="modal" data-target="#Medium-modal" class="o_status" data="{{$val->o_id}}" >  
                                Shipped
                              </a>                  
                            @elseif($val->o_status == 2)
                              <a href="{{url('admin/chandeorderstatus')}}/{{$val->o_id}}/3"  >  
                                Deliver
                              </a>
                            @elseif($val->o_status == 3)
                              <a>  
                                Delivered
                              </a>
                            @endif           
                           

                          </td>
                  <td>
                    <a href="{{url('admin/invoice')}}/{{$val->o_id}}" > <img src="{{asset('malefashion')}}/img/commerce_file_completed_confirmation_order_order_completed-128.webp"></a>
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
           


        
				
							<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">DeliveryBoy List</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<form action="{{url('admin')}}/assigndeliveryboy" method="POST">
                    @csrf
                    <input type="hidden" name="o_id" id="o_id" value="">
                      <select name="d_b_name" class="form-control ">
                      @foreach($userregistration as $d) 
                          <option value="{{$d->uid}}">{{$d->uname}}</option>
                      @endforeach
                        </select>
                      	<div class="modal-footer">
											<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Assign</button>
										</div>
                      </form>
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
  $('#otable').DataTable();

  $('.o_status').on('click',function(){
    // console.log($(this));
    var id=$(this).attr('data');
    // console.log(id);
    $('#o_id').val(id);
    
  });


});



</script>
@endsection