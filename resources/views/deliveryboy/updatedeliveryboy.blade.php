@extends('deliveryboy/app')
@section('deliveryboy/body')






<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"  style="margin-left:20px;">Edit/Update DeliveryBoy</h4>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" action="{{url('deliveryboy')}}/updatedeliveryboy/{{$userregistration->uid}}" method="post" enctype="multipart/form-data">
                      @csrf
                     
                    
                
                    
                      <div class="form-group">
                        <label>First Name</label>
                          <input type="text" class="form-control form-control-lg" id="uname" placeholder="Firstname" name="uname" value="{{$userregistration->uname}}">
                      </div>
                 
                      <div class="form-group">
                        <label>Date Of Birth</label>
                          <input type="date" class="form-control form-control-lg" id="dob" placeholder="Date Of Birth" name="dob" value="{{$userregistration->dob}}">
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
                          <input type="text" class="form-control form-control-lg" id="phone" placeholder="Phone" name="phone" value="{{$userregistration->phone}}">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                          <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" value="{{$userregistration->email}}">
                      </div>
                   
                      <div class="form-group">
                  <input type="file" class="form-control form-control-lg" id="image" name="image"  >
                </div>
                   
                    
                   
                    <button type="submit" class="btn btn-primary mr-2" >Edit DeliveryBoy</button>
                    

                  </form>
                  
               
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
          </div> 
            
       
	


@endsection



 
