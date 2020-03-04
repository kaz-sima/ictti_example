@extends("layouts.app")
@section("content")
<h1 align="center">Welcome Page</h1>
<div class="list-group col-sm-4 form-group-lg " style="left: 400px;">
    <a href="{{route('register')}}" class="list-group-item list-group-item-success">To Registration Page</a>
    <a href="{{url('/login')}}" class="list-group-item list-group-item-info">To Member Login</a>
    <a href="{{url('admin/login')}}" class="list-group-item list-group-item-warning">To Admin Login</a>
    <a href="{{url('about')}}" class="list-group-item list-group-item-danger">about us</a>
</div>
<div style="text-align:center">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.4423593823763!2d96.13345031394672!3d16.8539981884003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194926b08ebef%3A0x9936075ecb6cc22b!2sICTTI!5e0!3m2!1sen!2sjp!4v1587532209227!5m2!1sen!2sjp" width="500" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@endsection
