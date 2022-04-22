@extends('app')
@section('body')

<!-- #f3f2ee -->
<style>
    .breadcrumb{
        margin-top:50px !important;
        margin-bottom:50px !important;
        background:#f3f2ee !important;
    }
   
    .table2 {
	

        width:100% !important;
        margin-left:2px !important;
        margin-top:50px !important;
      
	border-collapse : inherit !important;
	
	margin-bottom: 50px;
	font-size: 0.9em;
	min-width: 300px;
	box-shadow :0 0 20px rgba(0, 0, 0, 0.15);
	overflow: hidden;
	
}
.table2 thead tr{
	background-color:#444444;
	color:#fff;
	text-align: center;
	font-weight: bold;
}
.table2 th,
.table2 td{
	padding: 12px 15px;

}
.table2 tbody tr{
	border-bottom: 1px solid #000;
}
.table2 tbody tr:nth-last-of-type(odd){
	background-color: #ebeaea;
}
.table2 tbody tr:last-of-type{
	border-bottom: 2px solid #444444 ;
}	
.table2 tbody tr.active-row{
	font-weight: bold;
	color: #ffffff;
}

</style>

<section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>My Order</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="breadcrumb container">
      
                        <table class="table1 table2">
                            <thead style="text-transform: uppercase;">
                                <th>Order Id</th>
                                <th>Total Amount</th>
                              {{--  <th>Discount</th>
                                <th>Total</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Pincode</th>
                            --}}
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Order Detail</th>
                                <th>Invoice</th>


                            </thead>
                            <tbody>
                             
                            @foreach($order as $o)
                                <tr style="text-align:center">
                                    <td>{{$o->o_id}}</td>
                                       
                                    
                                    <td>{{$o->amount}}</td>
                                  {{--  <td>{{$o->discount}}</td>
                                    <td>{{$o->amount + $o->discount}}</td>
                                    <td>{{$o->o_name}}</td>
                                    <td>{{$o->o_phone}}</td>
                                    <td>{{$o->o_email}}</td>
                                    <td>{{$o->pincode}}</td>
                                    --}}
                                    <td>Ordered</td>
                                    <td>{{$o->o_date}}</td>
                                    <td><a href="{{url('orderdetail')}}/{{$o->o_id}}" ><center><img src="{{asset('malefashion')}}/img/eye-68.png" style="height:20px;width:20px" ></center></a></td>
                                    <td><a href="{{url('userinvoice')}}/{{$o->o_id}}" > <img src="{{asset('malefashion')}}/img/commerce_file_completed_confirmation_order_order_completed-128.webp" style="height:30px"></a></td>

                                </tr>
                            @endforeach
                           
                                  
                                
                            </tbody>
                          </table>
    </div>
                          
                   
                    
                  
                           
                           
               
               
              
            
               
@endsection