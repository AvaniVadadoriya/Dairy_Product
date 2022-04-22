@extends('admin/app')
@section('admin/body')



	
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
       
          <div class="row  mt-3 ">
            <div class="col-xl-3  d-flex grid-margin stretch-card">
              <div class="card" style="border-radius:20px;background-color:pink">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Product</h4>

                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                  <h1 class="mb-3">{{$product->total_product}}</h1>
                  <img src="{{asset('malefashion')}}/img/product-purchase-1.png" style="height:50px">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3  d-flex grid-margin stretch-card">
              <div class="card" style="border-radius:20px;background-color:lightblue">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Order</h4>

                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                  <h1 class=" mb-3">{{$order->total_order}}</h1>
                  <img src="{{asset('malefashion')}}/img/order-144.png" style="height:50px">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3  d-flex grid-margin stretch-card">
              <div class="card" style="border-radius:20px;background-color:gainsboro">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">User</h4>
                     
                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                      <h1 class="mb-3 ">{{$userregistration->total_user}}</h1>
                      <img src="{{asset('malefashion')}}/img/customer-12.png" style="height:50px">
                      
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3  d-flex grid-margin stretch-card">
              <div class="card" style="border-radius:20px;background-color:tan">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Review</h4>

                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                  <h1 class="mb-3">{{$review->total_review}}</h1>
                  <img src="{{asset('malefashion')}}/img/rating.png" style="height:40px">

                  </div>
                </div>
              </div>
            </div>
          </div>
      
    
            <div class="row  mt-3">
             
              <div class="col-xl-6 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Month Wise Order</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                          </div>
                         <div id="columnchart_values">
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Month Wise Revenue</h4>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="row">
                          
                         <div id="piechart_3d" style="width: 390px; height: 400px;">
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        
            </div>
           
            
         
          </div>
          <!-- content-wrapper ends -->
@endsection
@section('admin/script')

	


          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Order", { role: "style" } ],
        @foreach($chart as $c)
        ["{{$c->chart_month}}", {{$c->order_count}}, "#1b1b29"],

        @endforeach
       
      ]);
     

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Month Wise Order",
        width: 390,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Profit', 'Amount'],
          @foreach($chart as $c)
          ['{{$c->chart_month}}',     {{$c->order_amt}}],
          @endforeach
        ]);

        var options = {
          title: 'Month Wise Revenue',
          is3D: true,
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  

@endsection