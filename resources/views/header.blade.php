



   <head>
  
    <title>KAMANA Dairy & Bakery Cafe</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('malefashion')}}/css/style.css" type="text/css">
</head>
<style>
    .h6{
        color:white !important;
       
        
    }
    .get-started-btn {
    margin-left: 25px !important;
    color: #ffffff !important;
    border-radius: 50px !important;
    padding: 8px 23px 7px 25px !important;
    white-space: nowrap !important;
    transition: 0.3s !important;
    font-size: 14px !important;
    display: inline-block !important;
    border: 2px solid #ffffff !important;
    font-weight: 600 !important;
}
.get-started-btn1 {
    margin-left: 25px !important;
    color: #ffffff !important;
    border-radius: 50px !important;
    padding: 8px 20px 7px 25px !important;
    white-space: nowrap !important;
    transition: 0.3s !important;
    font-size: 14px !important;
    display: inline-block !important;
    border: 2px solid #ffffff !important;
    font-weight: 600 !important;
}
.button{
    animation-duration: 3s !important;
    animation-timing-function: ease !important;
    animation-delay: 0s !important;
    animation-iteration-count: infinite !important;
    animation-direction: normal !important;
    animation-fill-mode: none !important;
    animation-play-state: running !important;
    animation-name: btn !important;
}
@keyframes btn{
    0% {
        transform: translateY(-8px);
    }
    50%{
        transform: translateY(8px);
    }
    100%{
        transform: translateY(-8px);
    }
    /* 50% {
        transform: translateY(-10px);
    } */
}


.kamana{

    margin-top:-10px !important;
    color:black;
    font-weight:900;
    font-size:22px;
    padding-left:40px;
    
    font-family:Lucida Handwriting;
    text-decoration:underline solid red;
    letter-spacing: 5px !important;

    text-shadow: 2px 2px 5px;
    text-underline-offset: 3px;

    
    
    
    
    
   
  


}
.kamana1{

color:red;

font-size:10px;
margin-top:-12px;
padding-left:100px;

font-family: Snell Roundhand, cursive;

}

.dot1 {
  height: 10px;
  width: 10px;
  background-color: black;
  border-radius: 50%;
  display: inline-block;
  margin-bottom:-10px;
  
}


    </style>

<body>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{asset('malefashion')}}/img/icon/search.png" alt=""></a>
            <a href="#"><img src="{{asset('malefashion')}}/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="{{asset('malefashion')}}/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row" >
                    <div class="col-lg-6 col-md-7" >
                        <div class="header__top__left">
                            {{-- <p>Free shipping, 30-day return or refund guarantee.</p> --}}
                        </div>
                        
                    </div>





                    <div class="col-lg-6 col-md-5">
                   
                   
                    
                        
                        <div class="header__top__right" style="color:white">
                  
                            <div class="header__top__hover   " >
                                
                                <span >
                                    @if(session()->get('user.uname') )
                                        Welcome {{session()->get('user.uname') }}  ! 
                                    
                                    @else
                                        {{session()->get('user.uname') }} 
                                    @endif

                                </span>

                                <ul >
                                
                                <a href="{{url('/editprofile')}}">  <li>Profile</li></a>
                                
                                
                                <a href="{{url('/changepassword')}}">  <li>Change Password</li></a>
                                <a href="{{url('/myorder')}}">  <li>My Order</li></a>
                            

                                </ul>
                            </div>
                      
                       
                            <div class="header__top__links">
                                @if(session()->has('user'))
                                <button type="submit" class="btn  get-started-btn1 button"  id="b2"><a href="{{url('logout')}}" style="color:white">Logout</a></button>

                                {{--   <a href="{{url('logout')}}" style="color:white">Logout</a>--}} 
                                    @else
                                    {{-- <a href="{{url('login')}}" style="color:white">Sign In</a> --}}
                                    <button type="submit" class="btn  get-started-btn button"  id="b2"><a href="{{url('login')}}" style="color:white">Sign In</a></button>
                                    @endif

                                 @php
                                 
                                    $id=session()->get('user.uid');
                                    if(isset($id))
                                    {
                                         $a= \DB::select('select * from promocode where promocode.uid=0 or promocode.uid='.$id); 

                                    }
                                    
                                @endphp 
                                
                                
                                @if(isset($a) && session()->get('user.uid'))

                                    <a href="{{url('/showcoupon')}}" > <img src="{{asset('malefashion')}}/img/gift-325-48.png" alt=""></a>
                               
                               
                                @endif
                                
                            </div>
                                    
                        
                        </div>
                      


                           
                        </div>
                        
                   
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="height:90px;">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                       {{-- <a href="{{url('/')}}"><img  src="{{asset('malefashion')}}/img/unnamed.png"  alt=""></a>--}}
                       <p class="kamana ">KAMANA <span class="dot1"></span>
                      
                            <p class="kamana1">DAIRY & BAKERY CAFE 
                      
                            </p>
                      
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul >
                            <li  class="active "><a href="{{url('/')}}" >Home</a></li>
                            <li><a href="{{url('/shop')}}">Shop</a>
                               
                            </li>
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            
                            <li><a href="{{url('/contactus')}}" >Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{asset('malefashion')}}/img/icon/search.png" alt=""></a>
                        @if(session()->has('user'))  

                           
                            @php
                                $wishlist = \DB::select('SELECT COUNT(uid) as wishcount FROM wishlist where uid='.session()->get('user.uid'));
                            
                            @endphp
                        @endif
                        @if(session()->has('user') && count($wishlist) > 0)


                            <a href="{{url('wishlist')}}"><img src="{{asset('malefashion')}}/img/icon/heart.png" alt="">
                                <span class="badge badge-pill bg-dark" style="margin-top:-23px;margin-left:5px; color:white;">{{$wishlist[0]->wishcount}}</span>
                            </a>


                        @else

                            <a href="{{url('wishlist')}}"><img src="{{asset('malefashion')}}/img/icon/heart.png" alt="">
                                <span class="badge badge-pill bg-dark" style="margin-top:-23px;margin-left:5px; color:white;">0</span>
                            </a>
                        @endif



                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        <a href="{{url('/cart')}}"><img src="{{asset('malefashion')}}/img/icon/cart.png" alt=""> <span class="badge badge-pill bg-dark " style="margin-top:-20px;margin-left:5px;color:white;">{{count(session()->get('cart'))}}</span></a>
                    @else
                        <a href="{{url('/cart')}}"><img src="{{asset('malefashion')}}/img/icon/cart.png" alt=""> <span class="badge badge-pill bg-dark " style="margin-top:-20px;margin-left:5px;color:white;">0</span></a>
                    @endif
                    @php $total=0; @endphp
                    @if(session()->has('cart'))
                        @foreach((session()->get('cart')) as $val)

                            @php 

                                $total= $val['qty']*$val['price']+$total;

                            @endphp
                        
                        
                            @endforeach
                    @endif
                         <div class="price">₹ {{$total}}</div>

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
  <!-- Search Begin -->
  <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="{{url('/searchproduct')}}" method="GET">
                @csrf
                <input type="text" id="search-input" placeholder="Search here....." name="pname">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <script src="{{asset('malefashion')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('malefashion')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('malefashion')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('malefashion')}}/js/jquery.nicescroll.min.js"></script>
    <script src="{{asset('malefashion')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('malefashion')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('malefashion')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('malefashion')}}/js/mixitup.min.js"></script>
    <script src="{{asset('malefashion')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('malefashion')}}/js/main.js"></script>
</body>

</html>

