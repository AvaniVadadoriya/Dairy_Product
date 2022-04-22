@extends('app')
@section('body')

<style>
    .login-body {
    margin: 0 !important;
    padding: 0 !important;
    width: 100% !important;
    height: 100vh !important;
}

.hero__slider.owl-carousel .owl-nav button{
color:white !important;
}

.wrap-slick1,
 {
  position: relative;
}
.rating{
    color :#f7941d !important;
    box-sizing: border-box !important; 
   
}
.star{
    color :#f7941d !important;
   
}


</style>
<link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg login-body" data-vide-bg="{{asset('malefashion')}}/v2.mp4" style="position: relative;">
                
                    <div style="position: absolute;z-index: -1;inset: 0px;overflow: hidden;background-size: cover;background-color: transparent;background-repeat: no-repeat;background-position: 50% 50%;background-image: none;"><video autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); visibility: visible; opacity: 1; width: 1351px; height: auto;"><source src="{{asset('malefashion')}}/v2.mp4" type="video/mp4"></video>
                    </div>

                    <div class="container">
                            <div  style="padding-top:20px ;text-align:center;letter-spacing:2px;">
                                @if(session()->has('message1'))
                                    <div class="alert alert-dark" id="alert" >
                                        <button type="button" class="close " data-dismiss="alert" >x</button>
                                            {{session()->get('message1')}}
                                    </div>
                                @endif
                                @if(session()->has('message2'))
                                    <div class="alert alert-dark" id="alert" >
                                        <button type="button" class="close " data-dismiss="alert" >x</button>
                                            {{session()->get('message2')}}
                                    </div>
                                @endif
                            </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-7 col-md-8">
                                <div class="hero__text">
                                    <h6 style="padding-top:200px">DAIRY & BAKERY CAFE</h6>
                                    <h2 style="color:white;">Milk - Better<br> <span style="margin-left:50px;">Health</span> </h2>
                                    <p style="color:darkgray;">  Milk is a good source of many essential nutrients, including calcium, protein, and vitamin D.</p>
                                    <a href="{{url('/shop')}}" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
           
        </div>
    </section>
  
    <!-- Hero Section End -->

  

   

















   
    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container ">
            <div class="row " >
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{asset('malefashion')}}/img/cheese1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                           
                            <a><h2 style="text-transform:capitalize;letter-spacing:1px;margin-bottom: -5px;">Dairy </h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{asset('malefashion')}}/img/biscuit.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                           
                            <a><h2 style="text-transform:capitalize;letter-spacing:1px;margin-bottom: -5px;">Bakery </h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{asset('malefashion')}}/img/cake1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <!-- <h2>Cake</h2> -->
                            <a><h2 style="text-transform:capitalize;letter-spacing:1px;margin-bottom: -5px;">Cake</h2></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
   
           
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                    <li class="active" data-filter="*">All Products</li>
                        @foreach($category as $val)
                        <li  data-filter=".{{$val->cname}}">{{$val->cname}}</li>
                        <!-- <li class="active" data-filter="*">Best Sellers</li> -->
                        <!-- <li data-filter=".hot-sales">Hot Sales</li> -->
                        @endforeach
                    </ul>
                </div>
            </div>
          
            <div class="row product__filter">
       
          
                    @foreach($product as $val)
                    @php
        $a = \DB::select('select * from attribute where pid='.$val->pid)[0];
        @endphp 
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{$val->cname}}">
             
                    <div class="product__item">
              
                     <div class="product__item__pic set-bg"  data-setbg="{{asset('Assets')}}/img/product/{{($images[$val->pid]!=''? $images[$val->pid]->url :'')}}">
                       
                        <span class="label">
                           @php 
                            $r=\DB::select('select pid from rating where pid='.$val->pid);
                            @endphp    
                            @php
                                if(isset($r))
                                {

                                $rate=\DB::select('SELECT sum(rating) as rating, COUNT(pid) as count_ratting , AVG(rating) as avg_ratting FROM rating where pid='.$val->pid.' GROUP BY pid');
                                }
                                @endphp
                          
                            @if(isset($rate[0]))
                                <div class="rating" style="font-size:20px">{{$rate[0]->avg_ratting}}<i class="fa fa-star star "></i> </div>
                                
                            @endif  
                        </span>
                            <ul class="product__hover">
                                <li>
                                       <a href="{{url('addtowishlist')}}/{{$val->pid}}"><img src="{{asset('malefashion')}}/img/icon/heart.png" alt=""></a>
                            
                                </li>

                                <li><a href="{{asset('Assets')}}/img/product/{{($images[$val->pid]!=''? $images[$val->pid]->url :'')}}" class="image-popup  " ><img src="{{asset('malefashion')}}/img/icon/compare.png" alt="" > <span>Compare</span></a></li>
                                <li><a href="{{url('productdetail')}}/{{$val->pid}}"><img src="{{asset('malefashion')}}/img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                   
          
                        <div class="product__item__text">
                            <p style="margin-bottom:2px;">{{$val->pname}}</p>
                            <h5>₹ {{$a->price}}</h5> 
                           
                            
                        
                           
                        </div>
                   
                    </div>
                   
                </div>
                @endforeach
</div></div>
           
    </section>
    <!-- Product Section End -->

  

  

   


    @endsection
    @section('script')
<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
            },3000);
       
       
    });

   
   
       
  
</script>
@endsection