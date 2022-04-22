 <!-- Footer Section Begin -->
 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{asset('Assets')}}/img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>QUICK LINKS</h6>
                        <ul>
                            <li><a href="{{url('')}}">Home</a></li>
                            <li><a href="{{url('shop')}}">shop</a></li>
                            <li><a href="{{url('contactus')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="{{url('registration')}}">My Account</a></li>
                            <li><a href="#">My Order</a></li>
                            <li><a href="{{url('checkout')}}">Checkout</a></li>
                            <li><a href="{{url('wishlist')}}">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | KAMANA Dairy And Bakery Cafe
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('Assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('Assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('Assets')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('Assets')}}/js/jquery.nicescroll.min.js"></script>
    <script src="{{asset('Assets')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('Assets')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('Assets')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('Assets')}}/js/mixitup.min.js"></script>
    <script src="{{asset('Assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('Assets')}}/js/main.js"></script>
</body>

</html>