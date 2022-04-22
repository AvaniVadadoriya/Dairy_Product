@extends('deliveryboy/app')
@section('deliveryboy/body')

        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
          <div class="row mt-3">
       
          <div class="col-xl-3  d-flex grid-margin stretch-card">
              <div class="card" style="border-radius:20px;background-color:pink">
                <div class="card-body">
                  <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Orders</h4>

                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                  <h1 class="mb-3">{{$order->total_order}}</h1>
                  <img src="{{asset('malefashion')}}/img/order-144.png" style="height:50px">
                  </div>
                </div>
              </div>
            </div>
</div>
            <div class="row  mt-3">
             
              <div class="col-lg-12 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                      <h4 class="card-title mb-3">Month Wise Orders</h4>
                    </div>
                    <div id="columnchart_values"></div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          @endsection
@section('deliveryboy/script')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Order", { role: "style" } ],
        @foreach($chart as $c)
        ["{{$c->chart_month}}", {{$c->order_count}},"stroke-color: black; stroke-opacity: 0.6; stroke-width: 8; fill-color: gray; fill-opacity: 0.2"],

        @endforeach
       
      ]);
    
    

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation"
                         },
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

@endsection