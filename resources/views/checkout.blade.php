@extends('app')
@section('body')

<style>
    #logo {
    text-align: center;
    position: relative;
    padding: 2px !important;
    width: 75px !important;
    height: 40px !important;
    background: #fff;
    border-radius: 3px;
    line-height: 38px;
    float: left;
    margin-right: 14px;
    -webkit-box-shadow: 0 1px 3px rgb(0 0 0 / 10%);
    box-shadow: 0 1px 3px rgb(0 0 0 / 10%);
}
    </style>
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <a href="{{url('/shop')}}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

       <!-- Checkout Section Begin -->
       <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h3 class="coupon__code" style="text-transform:uppercase;font-size:20px;letter-spacing:2px;word-spacing:5px"><center>Billing Details</center> </h3>
                            
                            <input type="hidden"  id="token" value="{{csrf_token()}}">
                                    <div class="checkout__input">
                                        <p>Name</p>
                                        <input type="text" name="name" class="name">
                                        @error('name') <span style="color:red">{{$message}}</span>  @enderror 

                                    </div>
                             
                                   

                            <div class="checkout__input">
                                <p>Address</p>
                                <input type="text"  class="checkout__input__add address" name="address" id="address">
                                @error('address') <span style="color:red">{{$message}}</span>  @enderror 

                            </div>
                            <div class="checkout__input">
                                <p>City</p>
                                <input type="text" name="city" class="city">
                                @error('city') <span style="color:red">{{$message}}</span>  @enderror 

                            </div>
                           
                            <div class="checkout__input">
                                <p>Postcode / ZIP</p>
                                <input type="text" name="pincode" class="pincode">
                                @error('pincode') <span style="color:red">{{$message}}</span>  @enderror 

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone</p>
                                        <input type="text" name="phone" class="phone">
                                        @error('phone') <span style="color:red">{{$message}}</span>  @enderror 

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email</p>
                                        <input type="email" name="email" class="email">
                                        @error('email') <span style="color:red">{{$message}}</span>  @enderror 

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                
                                    @php $total=0;$i=1; @endphp


                                        @foreach($cart as $key=>$c)
                                    
                                        <li>{{$i++}}. {{$c['pname']}}<span>₹ {{$c['qty']*$c['price']}}</span></li>
                                        @php 
                                        
                                            $total= $c['qty']*$c['price']+$total;

                                        @endphp
                                        @endforeach

                                </ul>
                                @php 
                        $dis=0 ;
                        if(session()->has('coupon'))
                        {
                            $dis= session()->get('coupon.discount');

                        }
                    @endphp
                    

                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>₹ {{$total}}</span></li>
                                    <li>Discount <span>₹ {{$dis}}</span></li>

                                     <li>Total <span>₹ {{$total - $dis}}</span></li> 
                                </ul>
                               
                                <input type="hidden" name="totalamt" id="totalamt" value="{{$total - $dis}}">
                                
                              
                               
                               
                                <button type="button" class="site-btn" id="rzp-button1">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  
<script>
    var name;
    var email;
    var phone;
    var address;
    var city;
    var pincode;
  

    var token=$('#token').val();

    var amount=$('#totalamt').val();
    var finalprice=amount * 100;
  
var options = {
    "key": "rzp_test_ssxEHMWnP2UJed", // Enter the Key ID generated from the Dashboard
    "amount": finalprice, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Dairy Product System",
    "description": "E-Commerce Website",
    "image": "{{asset('malefashion')}}/img/Screenshot (112).png",
    "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
       

        $.ajax({

            url:"{{url('payment')}}",
            method:"POST",
            data:{
                _token:token,
                   payment_id:response.razorpay_payment_id,
                  
                    name:name,
                    email:email,
                    phone:phone,
                    address:address,
                    city:city,
                    pincode:pincode,
                    amount:amount,

            },
            success:function(result)
            {
                // console.log(result);
                window.location.replace('cart');
            }
        });
       
    },
    "prefill": {
        "name": "Ashika",
        "email": "dairy@gmail.com",
        "contact": "9090876567"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#362d2d",
        
    }
    
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert("Payment Failed");
        
});

$('#rzp-button1').click(function(){
    name=$('.name').val();
    phone=$('.phone').val();

    email=$('.email').val();
   
    address=$('.address').val();
    city=$('.city').val();
    pincode=$('.pincode').val();

    rzp1.open();

});
</script>
@endsection
