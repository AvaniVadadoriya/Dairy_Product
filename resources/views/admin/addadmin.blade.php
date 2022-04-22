@extends('admin/app')
@section('admin/body')
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">

 

</head>
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="margin-left:20px;">Add Admin</h4>
                

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" method="POST" action="{{url('/admin/newadmin')}}" enctype="multipart/form-data">
                    @csrf 
                     
                    
                    
                  <div class="form-group">
                      <label for="uname">Admin Name</label>
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

                    <!-- <div class="form-group">
                         
                      <label >Image</label>
                      <div style="color:red">
                          @error('image'){{$message}}@enderror   
                          </div>
                      <input type="file" class="form-control" id="image" name="image">
                    </div> -->
                    
                    <button type="submit" class="btn btn-primary mr-2">Add Admin</button>
                    

                  </form>
                  
               
                </div>
              </div>
            </div>
            </div>
              </div>
            </div>
            
      
            
       
	


@endsection

