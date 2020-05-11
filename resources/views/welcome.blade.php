@extends("layouts.app")
@section("content")
<h1 align="center">Welcome Page</h1>
<div class="list-group col-sm-4 form-group-lg " style="left: 400px;">
    <a href="{{route('register')}}" class="list-group-item list-group-item-success">To Registration Page</a>
    <a href="{{url('/login')}}" class="list-group-item list-group-item-info">To Member Login</a>
    <a href="{{url('admin/login')}}" class="list-group-item list-group-item-warning">To Admin Login</a>
    <a href="{{url('about')}}" class="list-group-item list-group-item-danger">about us</a>
</div>
@endsection
