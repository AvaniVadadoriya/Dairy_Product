@extends('app')
@section('body')

   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">


       

            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
   
     <!-- Shopping Cart Section Begin -->
     <section class="shopping-cart spad">
        <div class="container">

        
                @if(session()->has('message'))
                    <div class="alert alert-dark" id="alert" style="margin-left:70px;margin-left:30px;">
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message')}}
                    </div>
                @endif
           
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i=0; @endphp
                                    @php $total=0; @endphp
                                @if(isset($cart) && count($cart)>0)
                                  

              
                                    @foreach($cart as $key => $val)

                                        <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img width="100px;" src="{{asset('Assets')}}/img/product/{{$val['img']}}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{$val['pname']}}</h6>
                                               
                                                <h5>₹ {{$val['price']}}</h5>
                                            </div>
                                        </td>


                                        <td class="cart__price">{{$val['size']}}</td>  
                                        
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <span class="fa fa-angle-left dec qtybtn"  data="{{$key}}" ></span>
                                                        <input id="cartqty_{{$key}}" type="text" class="addqty" value="{{$val['qty']}}"  >
                                                    <span class="fa fa-angle-right inc qtybtn" data="{{$key}}"></span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="cart__price">Rs.{{$val['qty']*$val['price']}}</td>
                                 
                                        <td class="cart__close " ><a    href="{{url('deletecart')}}/{{$key}}"><i class="fa fa-close"></i></a>
                                        
                                        </tr>

                                      
                                        @php $i++; @endphp
                                        
                                        @php 

                                            $total= $val['qty']*$val['price']+$total;

                                        @endphp

                                    @endforeach
                               @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{url('/shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form >
                            <input type="text" placeholder="Coupon code" id="code" name="code">
                            <button type="button" class="applycoupon">Apply</button>
                            
                        </form>
                        
                        <span class="error" style="color:red;"></span>
                      <span class="error1" style="color:green;"></span>

                    </div>
                    @php 
                        $dis=0 ;
                        if(session()->has('coupon'))
                        {
                            $dis= session()->get('coupon.discount');

                        }
                    @endphp

                                        
                    <div class="cart__total">
                        <h6>Cart total</h6>
                     
                          
                        <ul>  
                                @if(session()->has('cart') && count(session()->get('cart')) > 0)

                                    <li>Subtotal <span>₹ {{$total}}</span></li>
                                @else
                                    <li>Subtotal <span>₹ 0</span></li>

                                @endif

                               

                                @if(session()->has('cart') && count(session()->get('cart')) > 0)
                                     <li>    Discount  <span id="discount">₹ {{$dis}}  </span></li> 
                                @else
                                    <li>    Discount <span id="discount">₹ 0</span></li> 
                                 @endif
                                @if(session()->has('cart') && count(session()->get('cart')) > 0)

                                    <li>Total <span id="ftotal">₹ {{$total - $dis}} </span></li>    
                                @else
                                    <li>Total <span id="ftotal">₹ 0</span></li>    
                                @endif
                        </ul>
                        
                       
                      
                        <a href="{{url('/checkout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                    
                </div>
            </div> 
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@endsection
@section('script')
<script>

    $(document).ready(function(){
       
        setTimeout(function(){
            $("div.alert").remove();
            },3000);


      $('.qtybtn').click(function(){
          var key=$(this).attr('data');
        var cartqty=$('#cartqty_'+key).val();
        
        if($(this).hasClass('inc'))
        {
           $('#cartqty_'+key).val(parseInt(cartqty)+1);
           updatecart(key,parseInt(cartqty)+1);
        }
        else if($(this).hasClass('dec'))
        {
            // $('#cartqty_'+key).val(parseInt(cartqty)-1);
            // updatecart(key,parseInt(cartqty)-1);
            if (cartqty > 1) {
                var newVal = $('#cartqty_'+key).val(parseInt(cartqty)-1);
                updatecart(key,parseInt(cartqty)-1);
            } else {
                newVal = 1;
            }
        }
      });
      function updatecart(key,qty)
      {
        $total=0;
         $.ajax({
             url:"{{url('updatecart')}}/"+key+"/"+qty,
             success:function(result){
                 location.reload();
               
                 
             }

            
         });
       
    }
    
    $('.applycoupon').click(function(){

        var code=$('#code').val();
        
        $.ajax({

            url:"{{url('validcode')}}/"+code,
            dataType:'json',
            success:function(result){
               
               $('.error').html(result.msg);
               $('.error1').html(result.msg1);

                $('#discount').html("₹ " + result.discount);
                $('#ftotal').html("₹ " + result.total);

               



            }
        });
    });

   

    });
    </script>
@endsection

