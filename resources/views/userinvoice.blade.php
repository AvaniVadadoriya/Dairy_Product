



<!DOCTYPE html>
<html lang="en">

<head>


  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KAMANA Dairy & Bakery Cafe</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('Assets/admin')}}/images/favicon.png" />




  
</head>
<style>
.col-10{
   margin-left:90px !important;
}
@media print {
.button{
    display:none;
}
}

</style>

 <body >
  <div class="container-scroller">
    

      <div class="content-wrapper">

<div class="container">


      <h3 class="card-title" style="margin-left:90px;">Invoice #{{$order->o_id}}</h3>
        <div class="row">
            <div class="col-10">
                <div class="card">


        
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="{{asset('malefashion')}}/img/kamana.png" alt="Logo">
                        </div>

                        <div class="col-md-6 text-right">
                        
                            <p class="font-weight-bold mb-1">Payment No. : {{$order->payment_id}}</p>
                         
                            <p class="text-muted">Due to: {{$order->o_date}}</p>
                   
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                          
                      
                                <p class="mb-1">{{$order->o_name}}</p>
                                
                                <p class="mb-1">{{$order->address}},{{$order->city}}</p>
                                <p class="mb-1">{{$order->pincode}}</p>
                                <p class="mb-1">{{$order->o_phone}}</p>
                                <a  href="#">{{$order->o_email}}</a>
                                
                               
                           
                           
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment To</p>
                            <p class="mb-1">Dairy Product System</p>
                            <p class="mb-1">A-150,khodiyar nagar,Nana Varachha<br>Surat</p>
                            <a  href="#">dairy@gamil.com</a>
                            
                        </div>
                      
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Image</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Size</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php $total=0; @endphp
                                @foreach($orderdetail as $key => $o)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <div class="product__cart__item__pic">
                                                <img style="width:100px;height:100px"  src="{{asset('Assets')}}/img/product/{{($images[$o->pid]!=''?$images[$o->pid]->url:'')}}" alt="" >
                                            </div>
                                        </td>
                                        <td>{{$o->pname}}</td>
                                        <td>{{$o->o_size_id}} </td>
                                        <td>{{$o->o_qty}}</td>
                                        <td>₹ {{$o->o_price}}</td>
                                        <td>₹ {{$o->o_price * $o->o_qty}}</td>
                                    </tr>
                                    @php  
                                  $total=$o->o_price * $o->o_qty + $total;
                                  @endphp
                                    @endforeach
                                </tbody>
                             
                            </table>
                        </div>
                    </div>
                  
                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">₹ {{$total - $order->discount}}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Discount</div>
                            <div class="h2 font-weight-light">₹ {{($order->discount ? $order->discount :0)}}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light">₹ {{$total}}</div>
                        </div>

                    </div>
                   
                </div>
          </div>
        </div>
        <button type="button" class="btn btn-dark print_btn button"  style="margin-left:490px; margin-top:20px;margin-bottom:20px;" >Print This Reciept</button>

      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{asset('Assets/admin')}}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('Assets/admin')}}/js/off-canvas.js"></script>
  <script src="{{asset('Assets/admin')}}/js/hoverable-collapse.js"></script>
  <script src="{{asset('Assets/admin')}}/js/template.js"></script>
  <script src="{{asset('Assets/admin')}}/js/settings.js"></script>
  <script src="{{asset('Assets/admin')}}/js/todolist.js"></script>



  @section('admin/script')

<script src="jquery-3.6.0.min.js"></script>

<script>



$(document).ready(function(){
    $('.print_btn').click(function(){
        window.print();
    });
    
});

</script>
  <!-- endinject -->
</body>




</html>


