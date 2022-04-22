@extends('app')

@section('body')
<style>
    .zmdi{
        
    font-size: x-large !important;
    }
    .bor10 {
        margin-top:20px !important;
        margin-bottom:20px !important;
        padding-top:20px !important;

    border: 1px solid #e6e6e6 !important;

}
.rating{
    color :#f7941d !important;
    box-sizing: border-box !important; 

}


</style>

	<link rel="stylesheet" type="text/css" href="{{asset('cozastore')}}/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="{{asset('cozastore')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('cozastore')}}/css/main.css">
  <!-- Shop Details Section Begin -->
 <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">

            <div >
                @if(session()->has('message'))
                    <div class="alert alert-dark" id="alert">
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message')}}
                    </div>
                @endif
            </div>
           
      
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">

                        @foreach($images as $key=>$val)
                        <li class="nav-item">
                                <a class="nav-link {{($key==0 ? 'active' : '' )  }}" data-toggle="tab" href="#tabs-{{$key}}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{asset('Assets')}}/img/product/{{$val->url}}">
                                    </div>
                                </a>
                            </li>
                        @endforeach
                          
                        </ul>
                    </div>
                    <input type="hidden" class="pid" name="pid" value="{{$product->pid}}">


                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                        @foreach($images as $key => $val)
                        <div class="tab-pane {{($key==0 ? 'active' : '' )  }}" id="tabs-{{$key}}" role="tabpanel">
                                <div class="product_detailspic_item">
                                    <img src="{{asset('Assets')}}/img/product/{{$val->url}}" alt="">
                                </div>
                            </div>
                        @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <form action="{{url('addtocart')}}" method="POST">
        @csrf
      
         @php
        $a = \DB::select('select * from attribute where pid='.$product->pid)[0];
        @endphp 
        
        
        <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->pname}}</h4>
                           
                            <span class="label">
                            @foreach($r as $r)
                                @php
                                if($rating)
                                {
                                $rate=\DB::select('SELECT sum(rating) as rating, COUNT(pid) as count_ratting , AVG(rating) as avg_ratting FROM rating where pid='.$rating[0] ->pid.' GROUP BY pid');
                                }
                                @endphp
                           @endforeach
                                      
                               
                            
                                @if(isset($rate[0]))
                            <div class="rating" style="font-size:25px">{{$rate[0]->avg_ratting}}     <i class="fa fa-star " style="font-size:25px"></i></div>
                            
                            @endif
                                    </span> 
                            


                          
                          

                            <h3 id="price">₹ {{$a->price}}</h3>
                            <h6 id="mfg_date" style="margin:10px"><b>Mfg. Date :</b> {{$a->mfg_date}}</h6>

                            <h6 id="expire_date" style="margin:10px"><b>Exp. Date :</b> {{$a->expire_date}}</h6>

                            <p>{{$product->description}}</p>
                            <input type="hidden" name="pid" value=" {{$product->pid}}">
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    @foreach($size as $s)
                                    @if($s->size_id == $attribute->size_id)
                                    <label for="{{$s->size_name}}" class="active">{{$s->size_name}}
                                        <input class="packsize " type="radio" name="size" value="{{$s->size_id}}" id="{{$s->size_name}}" >
                                    </label>
                                    @else
                                    <label for="{{$s->size_name}}" >{{$s->size_name}}
                                        <input class="packsize " type="radio" name="size" value="{{$s->size_id}}" id="{{$s->size_name}}"  >
                                    </label>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                   <div class="">
                        <table class="table1" >
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="font-size:20px">Information Specification</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                              
                                <tr>
                                    <td class="">
                                        <div class="">
                                            <h6><b>Brand</b></h6>
                                        </div>
                                    </td>
                                    @foreach($brand as $b)
                                    <td colspan="2">{{$b->brand_name}}</td>
                                    @endforeach
                                </tr>
                             
                                @if(isset($flavour) && count($flavour) != '')
                                    <tr>
                                        <td >
                                            <div class="">
                                                <h6><b>Flavour</b></h6>
                                            </div>
                                        </td>
                                        @foreach($flavour as $f)
                                        <td colspan="2">
                                            {{$f->flav_name}}
                                        </td>
                                        @endforeach
                                    </tr>
                                @endif
                                <tr>
                                    <td class="">
                                        <div class="">
                                            <h6><b>Packtype</b></h6>
                                        </div>
                                    </td>
                                    @foreach($packtype as $p)
                                    <td colspan="2">{{$p->pack_name}}</td>
                                    @endforeach
                                </tr>
                              
                              
                            </tbody>
                        </table>
                    </div>
                          
                    <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="qty">
                                    </div>
                                </div>
                               <button type="submit" name="submit" class="primary-btn">Add To Cart</button>
                    </div>
                    
                  
                           
                           
                        
                        </div>
                    </div>
                </div>
               
        </form>


      


         <div class="product__details__content">
            <div class="container">
               
                <div class="row  ">
                    <div class="col-lg-12 ">
                        <div class="product__details__tab ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Ingredients</a>
                                </li>
                               
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">
                                    Reviews(@php echo (count($rating)); @endphp)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="row  bor10">    
                                        <div class="product__details__tab__content">
                                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                
                                                        {{$product->ingredients}}
                                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    


                        <div class="tab-pane fade " id="reviews" role="tabpanel">
							<div class="row  bor10">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
                                      
                                        @foreach($rating as $r)
                                           
										<div class="flex-w flex-t p-b-68">
											
											<div class="size-207">

                                         
												<div class="flex-w flex-sb-m p-b-17">
                                                  	
                                                    <span class="mtext-107 cl2 p-r-20" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">
                                                        {{$r->uname}} 
                                                    </span>
                                                                                                    @error('description') <span style="color:red">{{$message}}</span>  @enderror 

													<span class="fs-18 cl11"  >
													@for($i=0; $i < $r->rating; $i++)
														<i class="fa fa-star"></i>
														@endfor
													</span>
												</div>

												<p class="stext-102 cl6" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">
	                                                {{$r->review}}			
									            </p>
											</div>
										</div>
										@endforeach 
										<!-- Add review -->
										<form class="w-full" method="post" action="{{url('/rating')}}">
                                        @csrf
                                        <input type="hidden" name="pid" value="{{$product->pid}}">

											<h5 class="mtext-108 cl2 p-b-7" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">
												Add a review
											</h5>

											<p class="stext-102 cl6" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">
												Your email address will not be published. Required fields are marked *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">

												</span>
											</div>
                                            <div style="color:red">
                {{session()->get('message')}}
              </div>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                    @error('review') <span style="color:red">{{$message}}</span>  @enderror 

                                                </div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="uname" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;" >Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email" style="font-size: 15px;  font-family: 'Nunito Sans', sans-serif;">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>
											</div>

											

                                            <button type="submit" class="site-btn" id="submit" name="submit" value="submit" style="margin-left:1px;">Add Review</button>

										</form>
									</div>
								</div>
							</div>
						</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

	<script src="{{asset('cozastore')}}/vendor/animsition/js/animsition.min.js"></script>

	<script src="{{asset('cozastore')}}/js/main.js"></script>



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
<script>
            $('.packsize').change(function(){
                var size = $(this).val();
                var pid = $('.pid').val();
                // alert(pid);
                $.ajax({
                    url:"{{url('getprice')}}/"+size+"/"+pid,
                    success:function(result){
                        // alert(result);
                        $('#price').html(result);
                       }
                });
            });
            $('.packsize').change(function(){
                var size = $(this).val();
                var pid = $('.pid').val();
                // alert(size);
                $.ajax({
                    url:"{{url('getexpiredate')}}/"+size+"/"+pid,
                    success:function(result){
                        // alert('click');
                        $('#expire_date').html(result);
                       }
                });
            });
            $('.packsize').change(function(){
                var size = $(this).val();
                var pid = $('.pid').val();
                // alert(size);
                $.ajax({
                    url:"{{url('getmfgdate')}}/"+size+"/"+pid,
                    success:function(result){
                        // alert('click');
                        $('#mfg_date').html(result);
                       }
                });
            });
    </script>
@endsection