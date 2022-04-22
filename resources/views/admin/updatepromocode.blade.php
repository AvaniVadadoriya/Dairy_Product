@extends('admin/app')
@section('admin/body')
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('Assets/admin/new')}}/src/plugins/datatables/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('Assets/admin')}}/css/vertical-layout-light/responsive.dataTables.min.css">

</head>
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"  style="margin-left:20px;">Edit Promocode</h4>
                

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> 
                  <form class="forms-sample" method="POST" action="{{url('admin')}}/updatepromocode/{{$promocode->promo_id}}" enctype="multipart/form-data">
                    @csrf 
                     
                    <div class="form-group">
                      <label for="code">Code</label>
                      <input type="text" class="form-control" id="code" name="code" value="{{$promocode->code}}" placeholder="Enter Code">
                
                      <button type="button" class="btn btn-primary checkvalidcode" style="margin-top:20px" name="valid">Valid</button>
                    </div>
                     
                    
                  <div class="form-group">
                      <label for="uid">User Id</label>
                          <select name="uid" class="form-control">
                            <option value="0">All</option>
                            @foreach($userregistration as $val)
                                @if($val->uid==$promocode->uid)

                                    <option value="{{$val->uid}}" selected>{{$val->uname}}/{{$val->uid}}</option>
                                    @else
                                    <option value="{{$val->uid}}">{{$val->uname}}/{{$val->uid}}</option>
                                @endif
                              @endforeach
                          </select>


                    

                    </div>
                     
                    <div class="form-group">
                      <label for="promo_type" >Promocode Type</label>
                      <label class="form-check">
                       <input type="radio" name="promo_type" value="1" class="form-check-input" style="margin-left:5px;"  checked>
                          <span class="form-check-label" >Percentage(%)</span>
                      </label>
                      <label class="form-check">
                       <input type="radio" name="promo_type" value="0" class="form-check-input" style="margin-left:5px;" >
                          <span class="form-check-label">Flat</span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="amount">Amount</label>
                      <input type="number" class="form-control" id="amount" name="amount" value="{{$promocode->amount}}" placeholder="Enter Amount">
                      {{--      @error('amount') <span style="color:red">{{$message}}</span>  @enderror --}}

                    </div>
                  
                    <div class="form-group">
                      <label for="s_date">Starting Date</label>
                      <input type="date" class="form-control" id="s_date" name="s_date" value="{{$promocode->s_date}}"  placeholder="Enter Starting Date">
                      {{--  @error('s_date')  <span style="color:red">{{$message}}</span> @enderror --}}

                    </div>
                    <div class="form-group">
                      <label for="e_date">Ending Date</label>
                      <input type="date" class="form-control" id="e_date" name="e_date" value="{{$promocode->e_date}}"  placeholder="Enter Ending Date">
                      {{--  @error('e_date')  <span style="color:red">{{$message}}</span> @enderror --}}

                    </div>
                    <div class="form-group">
                      <label for="min_order"> Minimum Amount</label>
                      <input type="number" class="form-control" id="min_order" name="min_order" value="{{$promocode->min_order}}"  placeholder="Enter Minimum Amount">
                      {{-- @error('min_order')  <span style="color:red">{{$message}}</span> @enderror --}}

                    </div >
                    <div class="form-group">
                      <label for="no_use">No Of Use</label>
                      <input type="number" class="form-control" id="no_use" name="no_use" value="{{$promocode->no_use}}"  placeholder="Enter No Of Use">
                      {{-- @error('no_use')  <span style="color:red">{{$message}}</span> @enderror --}}

                    </div >
                   
                    <button type="submit" class="btn btn-primary mr-2">Edit Promocode</button>
                    

                  </form>
                  
               
                </div>
              </div>
            </div>
            </div>
              </div>
            </div>
            
      
           
               
@endsection
@section('admin/script')
<script src="{{asset('Assets/admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{asset('Assets/admin')}}/js/dataTables.responsive.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function(){
  $('#distable').DataTable();
});

$('.checkvalidcode').click(function(){
  var code=$('#code').val();
  $.ajax({
    url:"{{url('admin')}}/checkvalidcode/"+code,
    success:function(result){
      if(result == 0)
      {
          alert('valid');

      }
      else
      {
        alert('invalid');
      }
    }

  });

  
});

</script>


@endsection



