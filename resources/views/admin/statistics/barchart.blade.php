@extends('layouts.adminlayout')
@section('content')

<div id="form_page">
	<div class="container">
		<div class="home-list-header">
			<div class="col-6 offset-4">
				<h2>ICTTI/IMCEITS Library</h2>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<canvas id="myBarChart"></canvas>
     <script>        
		/*data of chart*/
		var array = {{ $counts }}; 
		/*Jquery instance*/
		var ctx = document.getElementById("myBarChart");
		/*instantiate Cart class*/
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Act','Nov','Dec'],
              datasets: [
                {
                  label: 'Monthly Total',
                  data: array,
                  backgroundColor: "rgba(255, 159, 64, 0.4)"
                },
              ]
            },
            options: {
              title: {
                display: true,
                text: 'Time series of Number of lending books'
              },
              scales: {
                yAxes: [{
                  ticks: {
                    suggestedMax: 20,
                    suggestedMin: 0,
                    stepSize: 10,
                  }
                }]
              },
            }
          });
     </script>
@endsection

