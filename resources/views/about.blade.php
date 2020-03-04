@extends('layouts.layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<span class=" fas fa-map-marker-alt"></span>	
			<p>,ICTTI,Hlaing Township,Yangon.</p>
		</div>
		<div class="col">
			<span class=" fas fa-phone"></span>
			<p>01-662329, 01-652542</p>
		</div>
		<div class="col">
			<span class=" far fa-envelope"></span>
			<p>@gmail.com</p>
		</div>
	</div>
<div class="text-center">
	<h3>location(map)</h3>
</div>
 	
    <div id="map" style="height: 500px; width: 80%; margin: 2rem auto 0;"></div>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('Google_key')}}"
    ></script>
   
   <!-- js -->
    <script type="text/javascript">
// displaying a map
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {
          lat: 16.853742, // Latitude
          lng: 96.135556 // Longitude
        },
        zoom: 15 // zoom
      });
	  // seting a pin to the map
      var myLatlng = new google.maps.LatLng(16.853742, 96.135556);
      var marker = new google.maps.Marker({
         position: myLatlng,
         map: map,
         title:"Wellcome ICTRC/ICTTI"
      });
    </script>
 </div>
@endsection
