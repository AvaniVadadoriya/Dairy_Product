@extends('deliveryboy/app')
@section('deliveryboy/body')

            
<head>
 
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>CelestialUI Admin</title>

 <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
 <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/css/vendor.bundle.base.css">

 <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/style.css">



 
</head>
<style>
 .checkout__total__products td span {
   color: #111111 !important;
   float: right !important;
}
</style>
<body>


        <div class="main-panel">
          <div class="content-wrapper ">
           
         
       
       
            <div class="row" >

              <div class="col-lg-5 d-flex grid-margin stretch-card" >
                <div class="card" style="margin-left:300px">
                  <div class="card-body"  >
                    <div class="d-flex flex-wrap justify-content-between" style="">
                    <h4 class="card-title mb-3" style="margin-left:10px;color:#E91E63;padding-bottom:12px;padding-top:12px"> MY PROFILE</h4>

                    </div>
                    <div class="table-responsive">
                                <table class="table" >
                                <tbody class="checkout__total__products">
                                <tr>
                                  <td> 
                                    <center><img src="{{asset('Assets')}}/profile/{{$images['url']}}" alt="" style="height:100px;width:100px"></center>                           
                                </tr>
                                  <tr >
                                    <td> 
                                        <b Style="color:black; ">First Name  </b><span >{{$userregistration->uname}}</span>
                                    </td>
                                  </tr>
                                    
                                    <tr>
                                    <td><b Style="color:black;">Date Of Birth  </b><span >{{$userregistration->dob}}</span>
                                    </td></tr>
                                    <tr>
                                    <td><b Style="color:black;">Phone No.  </b><span >{{$userregistration->phone}}</span>
                                    </td></tr>
                                    <tr>
                                    <td style="padding-bottom:12px;"><b Style="color:black;">Email  </b><span > {{$userregistration->email}}</span>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div> 
                  
                  </div>
                  
                  <a href="{{url('deliveryboy/fetchdeliveryboy')}}/{{$userregistration->uid}}" class="btn btn-primary">Edit Profile</a>

                </div>
              
              </div>
              </div>
              </div>

         @endsection


