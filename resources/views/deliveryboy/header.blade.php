<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KAMANA Dairy & Bakery Cafe</title>
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
  <body>
   
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <img src="{{asset('malefashion')}}/img/Screenshot (112).png" alt="logo" /> -->
        <a class="navbar-brand brand-logo" href="{{url('deliveryboy/dashboard')}}"><img src="{{asset('malefashion')}}/img/Screenshot (112).png" alt="logo" /></a>

         <a class="navbar-brand brand-logo-mini" href="{{url('deliveryboy/dashboard')}}"><img src="{{asset('Assets/admin')}}/images/logo-mini.svg" alt="logo"/></a>  
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        
          <ul class="navbar-nav navbar-nav-right">
            
           
           
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                
                <a class="dropdown-item" href="{{url('/deliveryboy/profile')}}">
                  <i class="typcn typcn-user-outline text-primary"></i>
                    Profile
                </a>
                 
                <a class="dropdown-item" href="{{url('/deliveryboy/changepassword')}}">
                  <i class="typcn typcn-key-outline text-primary"></i>
                    Change Password
                </a>
               
            
                @if(session()->has('deliveryboy'))

                
                <a class="dropdown-item" href="{{url('/deliveryboy/logout')}}">
                <i class="typcn typcn-power text-primary" ></i>
               Logout
                </a>

                
              </div>
                @endif
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </nav>


   