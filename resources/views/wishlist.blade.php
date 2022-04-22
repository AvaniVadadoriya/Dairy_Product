


@extends('app')
@section('body')

   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-option">
        <div class="container">


       

            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Wishlist</h4>
                        <div class="breadcrumb__links">
                            <a href="{{url('/')}}">Home</a>
                            
                            <span>Wishlist</span>
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
                    <div class="alert alert-dark" id="alert" >
                        <button type="button" class="close " data-dismiss="alert" >x</button>
                            {{session()->get('message')}}
                    </div>
                @endif
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                    @if(isset($wishlist) && count($wishlist) > 0)
                                @php  $i=0;  @endphp
                        <table>
                            <thead>
                                <tr>
                                <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                   
                                    <th>Size</th>
                                </tr>
                            </thead>
                            @foreach($wishlist as $key => $val)
                               @php 
                               $a = \DB::select('select * from attribute where pid='.$val->pid)[0];
                               $ins = \DB::select('SELECT * FROM attribute join size ON size.size_id = attribute.size_id where pid='.$val->pid)[0];
                               @endphp
                            <tbody>
                           

              
                                 

                                        <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                            <img src="{{asset('Assets')}}/img/product/{{($images[$val->pid]!=''?$images[$val->pid]->url:'')}}" alt="" width="100px">
                                            </div>
                                            <div class="product__cart__item__text">
                                            <h6>{{$val['pname']}}</h6>
                                               
                                           
                                            </div>
                                        </td>


                                        <td class="cart__price">₹ {{$a->price}}</td>  
                                        
                                       
                                        <td class="product__cart__item">{{$val['description']}}</td>
                                    <td class="cart__price">{{$ins->size_name}}</td>
                                    <td class="cart__close"><a href="{{url('deletewishlist')}}/{{$val->w_id}}"><i class="fa fa-close"></i></a></td>

                                        
                                        </tr>

                                      
                                        @php $i++; @endphp
                                        
                                      

                                    @endforeach
                              
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

               
                @else 

<div class="row" style="margin-left:400px;">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="continue__btn">
                <a href="#">Your Wishlist Is Empty !!</a>
            </div>
        </div>
        
    </div>
</div>
@endif

   
</div>
</div>
</div>

</section>
    <!-- Shopping Cart Section End -->


@endsection




