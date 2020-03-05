<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrator</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    	<link rel="stylesheet" href="{{asset('bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" />  
    	<link href="{{asset('DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    	<link href="{{ asset('fontawesome-free-5.10.1-web/css/all.css') }}" rel="stylesheet">
    		
    	<link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.carousel.min.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.theme.default.min.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.min.css')}}">
    	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css')}}">     		
    	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css')}}">
    	<link rel="icon" type="image/png" href="{{ asset('/images/favicon.ico')}}">

    	<script src="{{ asset('/js/owl.carousel.min.js')}}"></script>
    	<script src="{{ asset('/js/owl.carousel.js')}}"></script>
    	<script src="{{ asset('/js/style.js')}}"></script>
    	<script src="{{asset('jQuery-3.3.1/jquery-3.3.1.min.js')}}"></script>
    	<script src="{{asset('DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
    
    	<script>
    		function openNav() {
    		    document.getElementById("mySidenav").style.width = "250px";
    		}
        		function closeNav() {
    		    document.getElementById("mySidenav").style.width = "0";
    		}
    	</script>
    </head>
    <body>
      <nav class="navbar navbar-expand-md navbar-light  bg-light fixed-top">
	  	<a class="navbar-brand" href="#">
	  	  <img src="{{asset('images/ICTRC.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
          ICTRC
  	    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>
 		  <div class="pos-f-t">
		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
			<a class="navbar-toggler-icon" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
 			<div class="dropdown-menu" aria-labelledby="dropdown01">
 			@if(auth('admin')->check())
        		<a class="btn btn-default" href="{{ route('admin.top') }}">Admin Top
        	@elseif(auth('user')->check())
        		<a class="btn btn-default" href="{{ route('user.top') }}">User Top
        	@elseif(auth('staff')->check())
        		<a class="btn btn-default" href="{{ route('staff.top') }}">Staff Top	
        	@else
          		<a class="btn btn-default" href="{{ url('/') }}">To Start
        	@endif
          		</a>
            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>          
            </div>
      	  </li>
    	  </ul>
  		</div>
  		</div>
     <div class="col-lg">
       @if(auth()->check())
 	     <h6>Wellcome {{ auth()->user()->name }}</h6>
       @else
 	     <h6>Wellcome </h6>
       @endif
     </div>
   </nav>   

	@yield('content')

    <!-- App scripts -->
	@stack('scripts')

</body>
</html>
