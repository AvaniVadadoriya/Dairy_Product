
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
              <form class="pt-3" method="post" action="{{url('admin/forpassword')}}">
              @csrf
              <input type="hidden" name="token" value={{$token}}>
        <div class="form-group">
            <label  ><b class="label">Forgot Password</b></label>
            <div class="form-group">
            <input class="form-control form-control-lg"  type="password" name="password" id="password" placeholder="Enter New Password"  >
            @error('password') <span style="color:red">{{$message}}</span>  @enderror 
  
          </div>  
            <div class="form-group">
            <input class="form-control form-control-lg"  type="password" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password" >
            @error('confirm_password') <span style="color:red">{{$message}}</span>  @enderror 
 
          </div>  
        </div>      
        <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-block btn-lg font-weight-medium auth-form-btn">Change Password</button>
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


