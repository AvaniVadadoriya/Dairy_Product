
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
	.forgot:hover{
		color:blue !important;
		text-decoration:underline !important;


	}

	</style>
	</head>

<body>

	

	

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container" style="margin-left:200px;margin-right:100px;margin-top:-40px;margin-bottom:-80px">
			<div class="row">
				<div class="col-lg-5">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('malefashion')}}/img/about/p3.jpg" style="height:500px;width:480px" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="btn btn-dark btn-facebook auth-form-btn btn-rounded btn-fw log"     href="{{url('registration')}}">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
                       <span style="color:red"> {{session()->get('message')}}</span>
						<form class="row login_form" action="{{url('logincheck')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf	
                        <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" value="{{old('email')}}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @error('email') <span style="color:red">{{$message}}</span>  @enderror 

                            </div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password"  value="{{old('password')}}" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                @error('password')  <span style="color:red">{{$message}}</span> @enderror 

                            </div>
						
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="submit" id="submit" class="btn btn-block btn-dark btn-facebook auth-form-btn btn-rounded btn-fw typcn typcn-social-facebook-circular mr-2" >LOG IN</button>
								<a href="{{url('forgotpassword')}}" class="forgot"  style="margin-left:5px;margin-top:10px">Forgot Password?</a>
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

