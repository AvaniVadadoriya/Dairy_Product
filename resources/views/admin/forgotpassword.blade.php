{{--
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{asset('Assets')}}/images/favicon.ico">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>

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

	</style>
	</head>

<body>


<section class="login_box_area section_gap" >
		<div class="container" >
			<div class="row" >
			<div class="col-lg-4" style="margin-top:120px;margin-bottom:90px;margin-left:380px;box-shadow :0 0 20px rgba(0, 0, 0, 0.15);">
			  
					<div class="login_form_inner" style="padding:30px;">
					
				
	<form method="POST" action="{{url('sendlink')}}" class="row login_form" novalidate="novalidate">
        @csrf
        <div class="col-md-12 form-group" >
		
            <!-- <label style="margin-left:-170px;" >Enter Email</label><br> -->
			{{session()->get('message')}} 
            <input type="email" name="email" id="email" placeholder="Enter Email Address" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address'">

        </div> 
		  
        <div class="col-md-12 form-group" >
            <button type="submit" class="btn btn-block btn-dark btn-facebook auth-form-btn btn-rounded btn-fw typcn typcn-social-facebook-circular mr-2">Send Link</button>
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
--}}



<!DOCTYPE html>
<html lang="en">

<head>


  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CelestialUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('Assets/admin')}}/images/favicon.png" />




  
</head>

 <body >
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              
             
            <div style="color:red">
                {{session()->get('message')}}
              </div>
              <form class="pt-3" method="post" action="{{url('/admin/sendlink')}}">
              @csrf
               <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Enter Email Address">
                  @error('email') <span style="color:red">{{$message}}</span>  @enderror 

                </div>
               
                <div class="mt-3">
                  <button class="btn btn-primary btn-block btn-lg font-weight-medium auth-form-btn"  id="submit" type="submit">SEND LINK</button>
                  
                </div>
               
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{asset('Assets/admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('Assets/admin')}}/js/off-canvas.js"></script>
  <script src="{{asset('Assets/admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('Assets/admin')}}/js/template.js"></script>
  <script src="{{asset('Assets/admin')}}/js/settings.js"></script>
  <script src="{{asset('Assets/admin')}}/js/todolist.js"></script>
  <!-- endinject -->
</body>




</html>


