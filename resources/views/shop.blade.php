
@extends('app')
@section('body')


    

  
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('malefashion')}}/price/price_range_style.css"/>


</head>
<style>
    .ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active,
a.ui-button:active,
.ui-button:active,
.ui-button.ui-state-active:hover {
	border: 1px solid #f6f6f6;
	background: #9b0b0b !important;
	font-weight: normal;
	color: #ffffff;
}

.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
    border-bottom-right-radius: 25px !important;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
    border-bottom-left-radius: 25px !important;
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
    border-top-right-radius: 25px !important;
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
    border-top-left-radius: 25px !important;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: 1px solid #e53637;
    background: #e53637 !important;
    font-weight: normal;
    color: #e53637;
}

.rating{
    color :#f7941d !important;
    box-sizing: border-box !important; 

}
.star{
    color :#f7941d !important;
    

}
</style>


      <!-- Breadcrumb Section Begin -->
      <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
            <div >
                @if(session()->has('message'))
                    <div class="alert alert-dark" id="alert" style="margin-left:430px;padding-left:180px;margin-top:30px;width:500px">
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message')}}
                    </div>
                @endif
            </div>
            <div >
                @if(session()->has('message1'))
                    <div class="alert alert-dark" id="alert" style="margin-left:430px;padding-left:110px;margin-top:30px;width:500px">
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message1')}}
                    </div>
                @endif
            </div>
            <div >
                @if(session()->has('message2'))
                    <div class="alert alert-dark" id="alert" style="margin-left:430px;padding-left:150px;margin-top:30px;width:500px">
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message2')}}
                    </div>
                @endif
            </div>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="{{url('/searchproduct')}}" method="GET"> 
                            @csrf
                                <input type="text" placeholder="Search..." name="pname">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                       
                            <form method="POST" action="{{url('applyfilter')}}">
                                @csrf
                                <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                        <div class="card-heading">
                                            <a style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:30px">SHOP BY PRICE</a>
                                        </div>
                                            <ul>
                                        
                                                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                                                <div style="margin:30px auto ;display:flex; justify-content:space-between">
                                                <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" name="minprice"/>
                                                <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" name="maxprice"/>
                                                </div>

                                            
                                            </ul>
                        
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px" clsss="menu">SHOP BY CATEGORY</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($category as $cat)
                                                
                                                        <li>
                                                            <input type="checkbox"  name="cname[]" value="{{$cat->cid}}" id="category_{{$cat->cid}}">
                                                             <label for="category_{{$cat->cid}}">{{$cat->cname}}</label>
                                                        </li>
                                                    @endforeach
                                                        
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px">SHOP BY SUBCATEGORY</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($subcategory as $subcat)
                                                        <li>
                                                        <input type="checkbox" value="{{$subcat->s_c_id}}"  name="scname[]" id="subcategory_{{$subcat->s_c_id}}">

                                                        <label for="subcategory_{{$subcat->s_c_id}}" >{{$subcat->scname}}</label></li>
                                                    @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px">SHOP BY SIZE</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($size as $s)
                                                        <li>
                                                        <input type="checkbox" value="{{$s->size_id}}"  name="size_name[]" id="size_{{$s->size_id}}">

                                                        <label for="size_{{$s->size_id}}">{{$s->size_name}}</label></li>
                                                    @endforeach     
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFourth" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px">SHOP BY PACKTYPE</a>
                                    </div>
                                    <div id="collapseFourth" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                               @foreach($packtype as $type)
                                                        <li>
                                                        <input type="checkbox" value="{{$type->pack_id}}"  name="pack_name[]" id="packtype_{{$type->pack_id}}">

                                                        <label for="packtype_{{$type->pack_id}}" >{{$type->pack_name}}</label></li>
                                                @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px">SHOP BY BRAND</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($brand as $b)
                                                        <li>
                                                        <input type="checkbox" value="{{$b->brand_id}}"  name="brand_name[]" id="brand_{{$b->brand_id}}">

                                                        <label for="brand_{{$b->brand_id}}" >{{$b->brand_name}}</label></li>
                                                    @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix" style="text-decoration:underline 2px solid red; text-underline-offset: 5px;margin-bottom:20px">SHOP BY FLAVOUR</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                @foreach($flavour as $f)
                                                        <li>
                                                        <input type="checkbox" value="{{$f->flav_id}}"  name="flav_name[]" id="flavour_{{$f->flav_id}}">

                                                        <label for="flavour_{{$f->flav_id}}" >{{$f->flav_name}}</label></li>
                                                    @endforeach    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                                    <div class="col-md-12 form-group ">
								            <button type="submit"   id="submit" class="btn  btn-dark" style="margin-left:40px; border-radius:20px ; padding-left:20px;padding-right:20px" >FILTER</button>
								
							        </div>
                                </div>
                                
                        
                                  
                                
                                </div>
                            </form>
                        </div>
                    </div>
               
                <div class="col-lg-9">
                    


  







                    <div class="row">

                  
                        @foreach($product as $key=>$value)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('Assets')}}/img/product/{{$img[$value->pid]!='' ? $img[$value->pid]->url:''}}">
                                    <span class="label">
                                        @php 
                                        $r=\DB::select('select pid from rating where pid='.$value->pid);
                                        @endphp    
                                        @php
                                            if(isset($r))
                                            {

                                            $rate=\DB::select('SELECT sum(rating) as rating, COUNT(pid) as count_ratting , AVG(rating) as avg_ratting FROM rating where pid='.$value->pid.' GROUP BY pid');
                                            }
                                            @endphp
                                    
                                        @if(isset($rate[0]))
                                            <div class="rating" style="font-size:20px">{{$rate[0]->avg_ratting}}<i class="fa fa-star star "></i> </div>
                                            
                                        @endif
                                                @php
                                                    $a = \DB::select('select * from attribute where pid='.$value->pid)[0];
                                                @endphp
        
                                    </span> 
                                    <ul class="product__hover">
                                            <li><a href="{{url('addtowishlist')}}/{{$value->pid}}"><img src="{{asset('malefashion')}}/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="{{asset('Assets')}}/img/product/{{($img[$value->pid]!=''? $img[$value->pid]->url :'')}}" class="image-popup" ><img src="{{asset('malefashion')}}/img/icon/compare.png"  alt="" >     <span>Compare</span></a> </li>
                                            <li><a href="{{url('productdetail')}}/{{$value->pid}}"><img src="{{asset('malefashion')}}/img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                    <p style="margin-bottom:2px;">{{$value->pname}}</p>
                                       
                                   
        
                                        <h5>₹ {{$a->price}}</h5>
                                         
                                    </div>
    
         
                                </div>
                            </div>
                        @endforeach
                       
                    </div>
                   <div class="row">
                       <div class="col-lg-12 ">
                            {{$product->links('pagination')}}
                        </div>  
                       

                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

     <!-- Js Plugins -->
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


    








    
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="{{asset('malefashion')}}/price/price_range_script.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
            },3000);
       
       
    });



   
   
       
  
</script>
@endsection







