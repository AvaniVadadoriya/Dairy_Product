@extends('app')
@section('body')
<link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
<section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <h2>Contact Us</h2>
                            <span>Information</span>
                            

                        </div>
                        <ul>
                            <li>
                                <p>A-150,Khodiyar Nagar,Nana Varachha, 
                                 <br>surat.
                                 <br>395006   
                                <br /><br>
                                <i class="typcn typcn-phone text-danger " style="font-size:30px;color:red"></i>
                              <b> <span style="font-size:20px">Phone</span></b>
                               <br>
                                125-711-811 | 125-668-886
                                <br /><br>
                                <i class="typcn typcn-headphones text-danger " style="font-size:30px;color:red"></i>
                              <b> <span style="font-size:20px">Support</span></b>
                               <br>
                                kamana@gmail.com
                            </p>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{url('contact')}}" method="post">
                            @csrf
                            <div class="row">
                            <div style="color:red" >
                                {{session()->get('message')}}
                            </div>
                                <div class="col-lg-6">
                                @error('name') <span style="color:red; ">{{$message}}</span> @enderror

                                    <input type="text" placeholder="Name" name="name">

                                </div>
                                
                                <div class="col-lg-6">
                                @error('email') <span style="color:red">{{$message}}</span>  @enderror

                                    <input type="text" placeholder="Email" name="email">

                                </div>
                                <div class="col-lg-12">
                                @error('message') <span style="color:red">{{$message}}</span>  @enderror 

                                    <textarea placeholder="Message" name="message"></textarea>

                                    <button type="submit" name="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Map Begin -->
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119066.52982230402!2d72.82229625000001!3d21.15920015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1649228938599!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111551.9926412813!2d-90.27317134641879!3d38.606612219170856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1597926938024!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
        <!-- <iframe src="https://www.google.com/maps/place/Gujarat/@26.0809757,65.066106,6z/data=!4m5!3m4!1s0x3959051f5f0ef795:0x861bd887ed54522e!8m2!3d22.258652!4d71.1923805" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->

    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    
    <!-- Contact Section End -->
@endsection