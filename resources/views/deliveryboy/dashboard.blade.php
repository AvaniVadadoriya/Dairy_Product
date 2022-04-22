
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
              <div class="brand-logo">
                <img src="{{asset('malefashion')}}/img/kamana.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <span style="color:red ;margin-left:70px;margin-top:10px;font-size:17px" > {{session()->get('message')}}</span>      
              <form class="pt-3" method="post" action="{{url('/deliveryboy/logincheck')}}">
              @csrf
               <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Username">
                  @error('email') <span style="color:red">{{$message}}</span>  @enderror 

                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg " id="exampleInputPassword1" name="password" placeholder="Password">
                  @error('password')  <span style="color:red">{{$message}}</span> @enderror 

                </div>
                <div class="mt-3">
                  <button class="btn btn-primary btn-block btn-lg font-weight-medium auth-form-btn" name="submit" id="submit" type="submit">SIGN IN</button>
                  
                </div>
               
                <div class="my-2 d-flex justify-content-between align-items-center">
                
                  <a href="{{url('deliveryboy/forgotpassword')}}" class="auth-link text-black" style="margin-left:100px;margin-top:10px">Forgot password?</a>
                  
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

