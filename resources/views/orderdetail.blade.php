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
                            <a href="{{url('/myorder')}}">My Order</a>
                            <span>Order Detail</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
   
     <!-- Shopping Cart Section Begin -->
     <section class="shopping-cart spad" >
        <div class="container">

        
            <div class="row" >
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                       
                        <table >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                   
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $total=0; @endphp
                                @foreach($orderdetail as $key => $o)

                                    <tr >
                                            <td class="product__cart__item">{{$key + 1}}</td>
                                            <td class="product__cart__item"> {{$o->pname}}</td>
                                            <td class="product__cart__item">{{$o->o_size_id}}</td>  

                                        <td class="product__cart__item">₹ {{$o->o_price}}</td>
                                       

                                        
                                        

                                        <td class="product__cart__item">{{$o->o_qty}}</td>
                                 
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                            <img style="width:100px;height:100px"  src="{{asset('Assets')}}/img/product/{{($images[$o->pid]!=''?$images[$o->pid]->url:'')}}" alt="" >
                                            </div>
                                            
                                        </td>
                                        </tr>

                                 @endforeach
                                        
                            </tbody>
                        </table>

                    </div>
                   
                </div>

              
            </div> 
        </div>
    </section>
    <!-- Shopping Cart Section End -->


@endsection


