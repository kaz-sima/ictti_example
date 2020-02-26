@extends('layouts.userlayout')
@section('content')
<!-- error message -->
@include('common.errors')

<div class="container">
	<div class="div-editing-group">
		<div class="row">
			<div class="col-md-6">
				<div class="text-center">
					<h2>Confirm Profile</h2>
				</div>
				<p class="p-message"></p>
				<form action="{{ url('/profile/update') }}" method="post">
					{{ csrf_field() }}

					<ul>
						<li><label>Name</label> {{$data['name']}}</li>
						<li><label>Name</label> {{$data['gender']}}</li>
						<li><label>Name</label> {{$data['nrc']}}</li>
						<li><label>Name</label> {{$data['email']}}</li>
						<li><label>Password</label> Hidden</li>
						<li><label>phone</label> {{$data['phone']}}</li>
						<li><label>Name</label> {{$data['address']}}</li>
						<li><label>Name</label> {{$data['email']}}</li>
					</ul>
					<a href="{{ route('profile.edit') }}"> return</a> <input
						type="submit" value="update"> 
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

