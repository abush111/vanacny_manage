<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <head>
    <h2>Hoverable Dropdown</h2>
<p>Move the mouse over the button to open the dropdown menu.</p>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>
  <div class="dropdown">
  <button class="dropbtn">Select Report</button>
  <div class="dropdown-content">
    <a href="{{ route('pie.pie.index')}}">Organization</a>
    <a href="{{ route('pie2.pie2.index')}}">Organization Unit</a>
    <a href="{{ route('pie4.pie4.index')}}">Employee</a>
  </div>
</div>
</body>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],

          @foreach($result as $results)
       ['.{{$results->en_name}}.', {{$results->TotalEmployee}}],
         
@endforeach
          


        ]);

        var options = {
          title: 'Employee organization chart',
        pieHole: 0.4,


        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 1000px; height: 500px;"></div>
  </body>
</html>

