@extends('admin/app')
@section('admin/body')

  <link rel="stylesheet" href="{{asset('Assets/admin')}}/vendors/mdi/css/materialdesignicons.min.css">
 
<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">

<div class="main-panel">        
        <div class="content-wrapper">
         
          <div class="col-12 grid-margin stretch-card">
              <div class="card ">
                <div class="card-body ">

                  <h4 class="card-title">Add Attribute</h4>
                  <button type="submit" class="btn btn-primary mr-2 " id="add" name="submit" style="margin-bottom:20px;width:90px;height:40px">Add</button>

                  <form class="forms-sample" action="{{url('/admin/insertattribute')}}" method="POST">
                      @csrf
                     
                        
                        <input type="hidden" name="pid"  value="{{$product->pid}}"> 
                   
                        @if(isset($attribute) && count($attribute) > 0)
                        @foreach($attribute as $attr)
                     
                            <div class="row ">
                                <div class="form-group  col-md-2">
                                    <label for="size_id">Size</label>
                                    <select class="form-control" id="size_id" name="size_id[]">
                                        <option>Select Size</option> 
                                        
                                            @foreach($size as $val)
                                        <option value="{{$val->size_id}} "{{($attr->size_id == $val->size_id) ? 'selected' : ''}}> {{$val->size_name}}</option>
                                            @endforeach
                                    </select> 
                                
                                </div>
                            
                                <div class="form-group col-md-2">
                                    <label for="qty">Qty</label>
                                    <input type="number" class="form-control" name="qty[]" id="qty" placeholder="Enter Qty" value="{{$attr->qty}}" style="height: 33px;font-weight: 400;">
                            
                                </div> 
                                <div class="form-group col-md-2">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Price" value="{{$attr->price}}" style="height: 33px;font-weight: 400;">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="mfg_date">Manufacturing Date</label>
                                    <input type="date" class="form-control" id="mfg_date" name="mfg_date[]" placeholder="Enter Manufacturing Date" value="{{$attr->mfg_date}}" style="height: 33px;font-weight: 400;">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="expire_date">Expiry Date</label>
                                    <input type="date" class="form-control" id="expire_date" name="expire_date[]" placeholder="Enter Expiry Date" value="{{$attr->expire_date}}" style="height: 33px;font-weight: 400;">
                                </div>

                            </div>              
                        
                        @endforeach
                    @else
                        <div class="row " >
                            <div class="form-group col-md-4">
                                <label for="size_id">Size</label>
                                <select class="form-control" id="size_id" name="size_id[]">
                                    <option>Select Size</option> 
                                    
                                        @foreach($size as $val)
                                    <option value="{{$val->size_id}}">{{$val->size_name}}</option>
                                        @endforeach
                                </select>        
                            </div>


                            <div class="form-group col-md-2">
                                <label for="qty">Qty</label>
                                <input class="form-control" type="number" name="qty[]" id="qty" placeholder="Enter Qty" style="height: 33px;font-weight: 400;">
                            </div>
                            <div class="form-group col-md-2">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Price" style="height: 33px;font-weight: 400;" >
                            </div>
                            <div class="form-group col-md-2">
                                    <label for="mfg_date">Manufacturing Date</label>
                                    <input type="date" class="form-control" id="mfg_date" name="mfg_date[]" placeholder="Enter Manufacturing Date"  style="height: 33px;font-weight: 400;">
                                </div>
                           
                            <div class="form-group col-md-2">
                                    <label for="expire_date">Expire Date</label>
                                    <input type="date" class="form-control" id="expire_date" name="expire_date[]" placeholder="Enter Expire Date"  style="height: 33px;font-weight: 400;">
                            </div>
                            
                        </div>                  


               
                
                    @endif
                    <div class="append" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" >Add Attribute</button>
                    
                  </form>
                </div>
                
              </div>
            </div>
           

            </div>
            

               
@endsection

@section('admin/script')

<script>
 var c=0;
    $(document).ready(function(){
      
            $('#add').click(function(){
                $('.append').append('     \
                <div class="row" id="rm'+c+'" > \
                    <div class="form-group col-md-2">\
                      <label for="size_id">Size</label>\
                      <select class="form-control" id="size_id" name="size_id[]">\
                            <option>Select Size</option> \
                                @foreach($size as $val)\
                            <option value="{{$val->size_id}}">{{$val->size_name}}</option>\
                                @endforeach\
                        </select> \
                    </div>\
                    <div class="form-group col-md-2">\
                        <label for="qty">Qty</label>\
                        <input class="form-control" type="number" name="qty[]" id="qty" placeholder="Enter Qty" style="height: 33px;font-weight: 400;">\
                    </div>  \
                    <div class="form-group col-md-2">\
                        <label for="price">Price</label>\
                        <input type="text" class="form-control" id="price" name="price[]" placeholder="Enter Price" style="height: 33px;font-weight: 400;">\
                    </div>\
                    <div class="form-group col-md-2">\
                        <label for="mfg_date">Manufacturing Date</label>\
                        <input type="date" class="form-control" id="mfg_date" name="mfg_date[]" placeholder="Enter Manufacturing Date"  style="height: 33px;font-weight: 400;">\
                    </div>\
                    <div class="form-group col-md-2">\
                        <label for="expire_date">Expire Date</label>\
                        <input type="date" class="form-control" id="expire_date" name="expire_date[]" placeholder="Enter Expire Date"  style="height: 33px;font-weight: 400;">\
                    </div>\
                    <div class="form-group col-md-2" style="margin-top:33px;">\
                            <a data="'+c+'" class=" remove"  ><img src="{{asset('Assets/admin')}}/images/Delete_Icon_32.png" ></a>\
                    </div>\
                     </div> ');
        });
        c++;
   
    $('body').on('click','.remove',function(){
        var data=$(this).attr('data');
        $('#rm' + data).remove();
    });
});
    </script>

@endsection