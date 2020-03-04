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

<canvas id="my-chart"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script>
	var array = {{ $counts }};
	
    var data = {
        datasets: [{
        	 backgroundColor: ["rgba(255, 99, 132, 0.4)","rgba(54, 162, 235, 0.4)","rgba(255, 206, 86, 0.4)","rgba(75, 192, 192, 0.4)"],
             data: array
        }],
        labels: [
            'Lang',
            'Method',
            'Process',
            'Net Work'
        ]
    };
    new Chart('my-chart', {
        type: 'doughnut',
        data: data,
        options: {
            title: {
                display: true,
                fontSize: 35,
                text: 'Existing Book Category'
            }
        }
    });

</script>
@endsection

