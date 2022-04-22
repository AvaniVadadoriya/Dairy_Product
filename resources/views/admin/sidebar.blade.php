
<!-- partial -->
<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        
        <!-- <div class="theme-setting-wrapper">
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
        </div> -->
        <!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">

              <div class="sidebar-profile-image">
                @php
                $id=session()->get('admin.uid');
                if($id)
                {
                $images=\DB::select('select * from userregistration where uid='.$id);
                }
                
                @endphp
             @if(isset($images) || $id)
               
              <img src="{{asset('Assets')}}/profile/{{($images[0]->url!=''? $images[0]->url :'')}}" alt="" style="width:50px; height:50px">

             
              @else
              <img src="#" alt="" width="100px">
              @endif
                <span class="sidebar-status-indicator"></span>
              </div>
             
             
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
             
                {{session()->get('admin.uname') }}
                

                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
           
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/admin/dashboard')}}" >
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/category')}}">
              <i class="typcn typcn-th-large-outline menu-icon"></i>
              <!-- <img src="{{asset('Assets/admin')}}/images/6052154.png" width="20px" height="20px">  -->
              <span class="menu-title">Category </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/subcategory')}}">
              <i class="typcn typcn-th-list menu-icon"></i>
              <span class="menu-title">Sub Category </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/product')}}">
              <i class="typcn typcn-social-pinterest-circular menu-icon"></i>
              <span class="menu-title">Product </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/userlist')}}">
              <i class="typcn typcn-user-outline menu-icon" ></i>
              <span class="menu-title">User List </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/order')}}">
              <i class="typcn typcn-waves menu-icon" ></i>
              <span class="menu-title">Order List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/contactlist')}}">
              <i class="typcn typcn-waves menu-icon" ></i>
              <span class="menu-title">Contact List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/adddeliveryboy')}}">
            <i class="typcn typcn-anchor menu-icon" ></i>

              <span class="menu-title">Delivery Boy</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/size')}}">
              <i class="typcn typcn-arrow-move-outline menu-icon"></i>
              <span class="menu-title">Packsize / Unit </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/brand')}}">
              <i class="typcn typcn-tag menu-icon"></i>
              <span class="menu-title">Brand </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/flavour')}}">
              <i class="typcn typcn-feather menu-icon"></i>
              <span class="menu-title">Flavour </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/packtype')}}">
              <i class="typcn typcn-starburst-outline menu-icon"></i>
              <span class="menu-title">Packtype </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/promocode')}}">
              <i class="typcn typcn-gift menu-icon"></i>
              <span class="menu-title">Promocode </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/review')}}">
              <i class="typcn typcn-star-half-outline menu-icon"></i>
              <span class="menu-title">Review</span>
           
            </a>  
          </li>
          
        </ul>
       
      </nav>
      

     