

<style>


.coupon-container {
    position: relative;
    font-family:"Roboto",sans-serif;
    max-width:352px;
    text-align:center;
    border:dotted;
    margin:100px auto 30px auto;


}
.coupon-container .gift{
position: absolute;

top:-90px;
left:50%;
transform:translateX(-50%);

}
.coupon-container .bg{
    position: absolute;
    left:0;
    top:0;
    width:100%;
    height:100%;

}
.coupon-container h2,
.coupon-container p,
.coupon-container span,

.coupon-container .discount,
.coupon-container .code,
.coupon-container .date,
.coupon-container .btn{
    position: relative;
}
.coupon-container .date{
    margin-bottom:10px;
}


.coupon-container h2{
    color:#023047;
    font-weight:900;
    font-size:30px;
    padding-top:40px;
    margin-bottom:0;
}
.coupon-container p{
    font-size:18px;
    color:#023047;
    margin:8px;
}

.coupon-container .discount{
    font-family:"Poppins",sans-serif;;
    font-size:56px;
    font-weight:300;
    color:#076170;

}
.coupon-container .code{
    font-size:40px;
    font-weight:900;
}
.coupon-container .btn{
    text-decoration:none;
    background:#000;
    padding-top:4px;
    padding-bottom:10px;
    padding-left:120px;
    padding-right:120px;

    width:100%;
    color:#fff;
    box-sizing:border-box;
    font-size:24px;
    font-weight:900;
    margin-top:40px;
    text-transform:uppercase;




}
.coupon-container .btn:hover{
    color:#076170;

}
body{
    background:#EBECF0;

}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAMANA Dairy & Bakery Cafe</title>
</head>

   
<body>
    <div class="coupon-container">
      
       <img src="{{url('malefashion')}}/img/download (4).png" alt="" class="bg"> 

       <img src="{{url('malefashion')}}/img/gift-81-128.png" alt="" class="gift"> 

       <h2>Congratulations!</h2>
        <p>You can get</p>

      
        @if($coupon!= '')
            @foreach($coupon as $val)
                <div class="discount">{{($val->promo_type == 0 ? '₹ '.$val->amount : $val->amount.'%' )}} off</div>
                <p >on order of ₹ {{$val->min_order}} or more*</p>
                <p ><u>Here is your code</u></p>
                <div class="code">{{$val->code}}</div>
                 

                

                <div class="date">{{$val->s_date}} to {{$val->e_date}} </div>
                
               
            @endforeach
                         
        @endif
        <a href="{{url('cart')}}" class="btn">Redeem</a>
    </div>
</body>

</html>
