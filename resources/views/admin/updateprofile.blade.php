

            
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CelestialUI Admin</title>
 
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/style.css">
 


  
</head>
<style>
  .checkout__total__products td span {
    color: #111111 !important;
    float: right !important;
}
</style>
<body>

    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          
          <div class="d-flex grid-margin stretch-card"  style="margin-left:190px;margin-bottom:253px;">
                <div class="card">
                  <div class="card-body"  style="hight:50%; width:350px;">
                    <!-- <div class="d-flex flex-wrap justify-content-between"> -->
                     <center> <h4 class="card-title mb-3" style="color:#E91E63;"> MY PROFILE</h4></center>
                  </div>

                 
                  <div class="table-responsive">
                      <table class="table" >
                        <tbody class="checkout__total__products">
						              <tr>
                           <td> 
                              <center><img src="{{asset('Assets')}}/profile/{{$images['url']}}" alt="" style="height:100px;width:100px"></center>                           
                          </tr>
                          <tr >
                           <td> 
                               <b Style="color:black; ">First Name  </b><span >{{$userregistration->uname}}</span>
                            </td></tr>
                            
                            <tr>
                            <td><b Style="color:black;">Date Of Birth  </b><span >{{$userregistration->dob}}</span>
                            </td></tr>
                            <tr>
                            <td><b Style="color:black;">Phone No.  </b><span >{{$userregistration->phone}}</span>
                            </td></tr>
                            <tr>
                            <td><b Style="color:black;">Email  </b><span> {{$userregistration->email}}</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div> 

                 

                 
                               

                               
                               
                             
                </div>
          </div>
     
        <div class="col-lg-7 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="margin-right:170px">
            <div class="brand-logo">
                <img src="{{asset('malefashion')}}/img/kamana.png" alt="logo">
            </div>
              {{session()->get('message')}}
            <form class="pt-3" action="{{url('admin')}}/updateprofile/{{$userregistration->uid}}"  method="post" enctype="multipart/form-data">
              @csrf  
                <div class="form-group">
                <!-- <label><b>First Name</b></label> -->
                  <input type="text" class="form-control form-control-lg" id="uname" placeholder="Firstname" name="uname" value="{{$userregistration->uname}}">
                </div>
              
                <div class="form-group">
                  <input type="date" class="form-control form-control-lg" id="dob" placeholder="Date Of Birth" name="dob" value="{{$userregistration->dob}}">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="phone" placeholder="Phone" name="phone" value="{{$userregistration->phone}}">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" value="{{$userregistration->email}}">
                </div>
				        <div class="form-group">
                  <input type="file" class="form-control form-control-lg" id="image" name="image"  >
                </div>



                <div class="text-center mt-4 font-weight-light">
                  <button type="submit"  id="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="width:100%">Update Profile</button>
                </div>
            </form>
          </div>
        </div>
      </div>   </div>
      </div>
      </div>

   
  

</body>

<!-- <script src="{{asset('Assets/admin')}}/vendors/scripts/core.js"></script>
	<script src="{{asset('Assets/admin')}}/vendors/scripts/script.min.js"></script>
	<script src="{{asset('Assets/admin')}}/vendors/scripts/process.js"></script>
	<script src="{{asset('Assets/admin')}}/vendors/scripts/layout-settings.js"></script>
	<script src="{{asset('Assets/admin')}}/src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>   


 -->




