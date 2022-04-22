@extends('app')
@section('body')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>About Us</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__pic">
                        <img src="{{asset('malefashion')}}/img/about/bakery-product.png" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Who We Are ?</h4>
                        <p>Contextual advertising programs sometimes have strict policies that need to be adhered too.
                        Let’s take Google as an example.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Who We Do ?</h4>
                        <p>In this digital generation where information can be easily obtained within seconds, business
                        cards still have retained their importance.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="about__item">
                        <h4>Why Choose Us</h4>
                        <p>A two or three storey house is the ideal way to maximise the piece of earth on which our home
                        sits, but for older or infirm people.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="testimonial__text">
                        <span class="icon_quotations"></span>
                        <p>“Going out after work? Take your butane curling iron with you to the office, heat it up,
                            style your hair before you leave the office and you won’t have to make a trip back home.”
                        </p>
                
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="testimonial__pic set-bg" data-setbg="{{asset('malefashion')}}/img/about/milk-and-bakery-products.webp"></div>
                </div>
                
            </div>
        </div>
    </section>
<section>
            <div class="container">
            <div class="row">
            <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{asset('malefashion')}}/img/about/1568188944-b.jpg" alt="" >
                        </div>
                        <div class="banner__item__text">
                        <h2>Our Expectations</h2>
                            <p style="font-size:20px; font-family:Times New Roman;"><b>“We see our customers as invited guests to a party, and we are the hosts. It’s our job every day to make every important aspect of the customer experience a little bit better.”</b></p>
                            
                        </div>
                    </div>
                </div>
</div>
</div>
</section>

    <!-- Testimonial Section End -->

    <!-- Counter Section Begin -->
    <section class="counter spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">{{$category -> total_category}}</h2>
                        </div>
                        <span>Total<br />Category</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">{{$subcategories -> total_subcategories}}</h2>
                        </div>
                        <span>Total <br />Sub Category</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">{{$product -> total_product}}</h2>
                        </div>
                        <span>Total<br />Product</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="counter__item">
                        <div class="counter__item__number">
                            <h2 class="cn_num">{{$userregistration -> total_user}}</h2>
                            
                        </div>
                        <span>Happy <br />Customer</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Section End -->

    
@endsection