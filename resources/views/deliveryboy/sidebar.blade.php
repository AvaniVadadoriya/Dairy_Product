
<!-- partial -->
<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
             
              @php
                $id=session()->get('deliveryboy.uid');
                if($id)
                {
                $images=\DB::select('select * from userregistration where uid='.$id);
                }
                
                @endphp
             @if(isset($images) || $id)
                <img src="{{asset('Assets')}}/profile/{{$images[0]->url}}" alt="" style="width:50px; height:50px">

             
              @else
              <img src="#" alt="" width="100px">
              @endif
                
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
             
                {{session()->get('deliveryboy.uname') }}
                

                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/deliveryboy/dashboard')}}" >
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>
        
         
          <li class="nav-item">
            <a class="nav-link" href="{{url('/deliveryboy/orderlist')}}">
              <i class="typcn typcn-waves menu-icon" ></i>
              <span class="menu-title">Order List</span>
            </a>
          </li>
          
          
          
        </ul>
       
      </nav>
      

     