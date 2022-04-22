@extends('app')
@section('body')


<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Edit Profile</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            
                            <span>Edit Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

       <!-- Checkout Section Begin -->
       <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{url('updateprofile')}}/{{$userregistration->uid}} " method="post">
                @csrf	
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your Profile</h4>
                               
                                <ul class="checkout__total__products">
                              
                            
                                    
                                   
                                <li><b>Name</b> <span>{{$userregistration->uname}}</span></li>
                                <li><b>Phone</b><span>{{$userregistration->phone}}</span></li>
                                <li><b>Email</b><span>{{$userregistration->email}}</span></li>
                                <li><b>Date of Birth</b><span>{{$userregistration->dob}}</span></li>
                                   
                                   
                                    
                                   
                                </ul>
                               

                               
                               
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-6">
                            
                            <h6 class="checkout__title">Edit Profile</h6>
                            
           
                                    <div class="checkout__input">
                                        <p>Name</p>
                                        <input type="text" class="form-control" id="uname" name="uname"  value="{{$userregistration->uname}}" >
                                    </div>
                                
                           
                         
                            <div class="checkout__input">
                                <p>Date of Birth</p>
								<input type="date" class="form-control" id="dob" name="dob"  value="{{$userregistration->dob}}" >
                            </div>
                            
                           
                                    <div class="checkout__input">
                                        <p>Phone</p>
                                        <input type="text" class="form-control" id="exampleInputphone1" name="phone" value="{{$userregistration->phone}}" >
                                    </div>
                              
                                
                                    <div class="checkout__input">
                                        <p>Email</p>
                                        <input type="email" class="form-control" id="name" name="email" value="{{$userregistration->email}}" >
                                    </div>
                                
                           
                        </div>
                        
                    </div>
                    <button type="submit" class="site-btn" id="submit" name="submit" value="submit" style="margin-left:680px;">Update Profile</button>

                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


@endsection

