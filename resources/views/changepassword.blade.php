
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
	}
.label{
	color:black !important;
	font-size:20px;
}
	</style>
	</head>

<body>

<section class="login_box_area section_gap" >
		<div class="container" >
			<div class="row" >
			<div class="col-lg-4" style="margin-top:40px;margin-bottom:40px;margin-left:380px;box-shadow :0 0 20px rgba(0, 0, 0, 0.15);">
			  
					<div class="login_form_inner" style="padding:30px;">
					

					<div style="color:red">
                {{session()->get('message')}}
              </div>

	<form method="POST" action="{{url('updatechangepassword')}}" class="row login_form" novalidate="novalidate">
        @csrf
        <div class="col-md-12 form-group">
            <label  ><b class="label">Change Password</b></label>
            <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter Old Password" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Old Password'">
            
			    @error('oldpassword') <span style="color:red">{{$message}}</span>  @enderror 
			<input type="password" name="newpassword" id="newpassword" placeholder="Enter New Password" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter New Password'">
            @error('newpassword') <span style="color:red">{{$message}}</span>  @enderror 

            <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Confirm Password'">
            @error('confirm_password') <span style="color:red">{{$message}}</span>  @enderror 

        </div>      
        <div class="col-md-12 form-group">
            <button type="submit" class="btn btn-block btn-dark btn-facebook auth-form-btn btn-rounded btn-fw typcn typcn-social-facebook-circular mr-2" >Change Password</button>
        </div>
</form>
</div>
</div>
</div>
</div>
	</section>

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

