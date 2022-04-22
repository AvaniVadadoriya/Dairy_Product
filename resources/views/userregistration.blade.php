
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<!-- <link rel="shortcut icon" href="{{asset('Assets')}}/images/favicon.ico"> -->
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="{{asset('asseting')}}/css/linearicons.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/owl.carousel.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/themify-icons.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/nice-select.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/nouislider.min.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/bootstrap.css">
	<link rel="stylesheet" href="{{asset('asseting')}}/css/main.css">
	<link rel="stylesheet" href="{{asset('Assets')}}/css/style.css">
	<link rel="stylesheet" href="{{asset('Assets')}}/css/bootstrap.min.css">
<style>
	.log{
		background-color:black !important;
		color:white !important;
		font-weight:400 !important;
		border-radius:20px !important;
		padding-left: 25px !important;
		padding-right: 25px !important;
		padding-top: 5px !important;
		padding-bottom: 8px !important;


		border-color:white !important;
	}

	</style>

</head>

<body>

	

	

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container" >
			<div class="row" >
				<div class="col-lg-6" >
					<div class="login_box_img" >
						<img class="img-fluid" src="{{asset('Assets')}}/cakeimage/Birthday & Party Cakes/b.jfif" style="height:920px;"   alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a  href="{{url('login')}}" class="btn btn-dark log btn-facebook auth-form-btn btn-rounded btn-fw" >Log In Here</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner" >
						<h3>Register in to enter</h3>
						<span style="color:red ;margin-left:70px;margin-top:10px;font-size:17px" > {{session()->get('message')}}</span>      
						<form class="row login_form" action="{{url('register')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf	
                        <div class=" col-md-12 form-group">
                  <input type="text" class="form-control" id="exampleInputuname1" name="uname" value="{{old('uname')}}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                    @error('uname') <span style="color:red;">{{$message}}</span> @enderror
                 </div>
                 <div class="col-md-12 form-group">
                   <input type="text" class="form-control" id="exampleInputphone1" name="phone" value="{{old('phone')}}" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
                  @error('phone') <span style="color:red;">{{$message}}</span> @enderror
                 </div>
                        <div class="col-md-12 form-group">
								            <input type="email" class="form-control" id="name" name="email" value="{{old('email')}}" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                @error('email') <span style="color:red">{{$message}}</span>  @enderror 
                        </div>
						
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password"  value="{{old('password')}}" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                @error('password')  <span style="color:red">{{$message}}</span> @enderror 

                            </div>
						
                            <div class="col-md-12 form-group">
                   <input type="password" class="form-control " id="exampleInputpassword1" name="confirm_password"  value="{{old('confirm_password')}}" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                  @error('confirm_password') <span style="color:red;">{{$message}}</span> @enderror
                 </div>
				 <div class="col-md-12 form-group">
								<input type="date" class="form-control" id="dob" name="dob"  value="{{old('dob')}}" placeholder="Date of Birth" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date of Birth'">
                                @error('dob')  <span style="color:red">{{$message}}</span> @enderror 

                            </div>
				
				
                <div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="terms" value="1" name="terms">
									<label for="terms"> I agree to all Terms & Conditions</label><br>
                  @error('terms') <span style="color:red;">{{$message}}</span> @enderror

								</div>
							</div>
							
							<div class="col-md-12 form-group ">
								<button type="submit" value="submit" name="submit" id="submit" class="btn btn-block btn-dark btn-facebook auth-form-btn btn-rounded btn-fw typcn typcn-social-facebook-circular mr-2" >REGISTER IN</button>
								
							</div>
                            
             

               
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	


	<script src="{{asset('asseting')}}/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="{{asset('asseting')}}/js/vendor/bootstrap.min.js"></script>
	<script src="{{asset('asseting')}}/js/jquery.ajaxchimp.min.js"></script>
	<script src="{{asset('asseting')}}/js/jquery.nice-select.min.js"></script>
	<script src="{{asset('asseting')}}/js/jquery.sticky.js"></script>
	<script src="{{asset('asseting')}}/js/nouislider.min.js"></script>
	<script src="{{asset('asseting')}}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('asseting')}}/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{asset('asseting')}}/js/gmaps.min.js"></script>
	<script src="{{asset('asseting')}}/js/main.js"></script>
</body>

</html>

