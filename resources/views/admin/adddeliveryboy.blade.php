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
                  <h4 class="card-title" style="margin-left:20px;">Add Delivery Boy</h4>
                

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" method="POST" action="{{url('/admin/newdeliveryboy')}}" enctype="multipart/form-data">
                    @csrf 
                     
                    
                    
                  <div class="form-group">
                      <label for="uname">DeliveryBoy Name</label>
                      <input type="text" class="form-control" id="uname" name="uname"  placeholder="Enter Admin Name">
                      @error('uname') <span style="color:red;">{{$message}}</span> @enderror

                    </div>
                     
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter Phone">
                      @error('phone') <span style="color:red;">{{$message}}</span> @enderror

                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email">
                      @error('email') <span style="color:red">{{$message}}</span>  @enderror 

                    </div>
                    <div class="form-group">
                    <label for="dob">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" >
                         @error('dob')  <span style="color:red">{{$message}}</span> @enderror 

                    </div>
                  
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password"    placeholder="Enter Password">
                      @error('password')  <span style="color:red">{{$message}}</span> @enderror 

                    </div>
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password"  placeholder="Enter Confirm_Password">
                      @error('confirm_password')  <span style="color:red">{{$message}}</span> @enderror 

                    </div>
                   
                    <div class="col-md-12 form-group">
						<div class="creat_account">
							<input type="checkbox" id="terms" value="1" name="terms">
								<label for="terms"> I agree to all Terms & Conditions</label><br>
                                    @error('terms') <span style="color:red;">{{$message}}</span> @enderror

						</div>
					</div>

          <div class="form-group">
                  <input type="file" class="form-control form-control-lg" id="image" name="image" >
                  @error('image'){{$message}}@enderror   

                </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Add DeliveryBoy</button>
                    

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
                  <h4 class="card-title" >DeliveryBoy List</h4>
                    {{session()->get('message')}}
                  <div class="table-responsive" >
                    <table class="table table-striped responsive " id="dtable" >
                      <thead>
                        <tr>
                          <th class="all">
                            No.
                          </th>
                          <th class="all">
                            Name
                          </th>
                          <th class="all">
                           Phone
                          </th>
                          <th class="all">
                           Email
                          </th>
                          <th class="none">
                           Date of Birth
                          </th>
                         
                          <th class="datatable-nosort">
                           Action
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($deliveryboy as $val)
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

                  

                  <a href="{{url('admin/deletedeliveryboy')}}/{{$val->uid}}"> <img src="{{asset('Assets/admin')}}/images/Delete_Icon_48.png"></a>

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

<script src="jquery-3.6.0.min.js"></script>
<script src="{{asset('Assets/admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Assets/admin')}}/js/dataTables.responsive.min.js"></script>

<script>

$(document).ready(function(){
  $('#dtable').DataTable();
});
</script>


</script>
@endsection
