@extends('layouts.adminlayout')
@section('content')
	<div id="form_page">
		<div class="container">
			<div class="home-list-header">
				<div class="row">
					<div class="col-4 offset-4">
						<h2>Add Ctgry & Sub Ctgry</h2>
					</div>
				</div>
			</div>
            <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Ctgry</strong></div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                <form action="{{url('admin/ctgry/add')}}" method="POST">
                {{csrf_field()}}
               	<tr><th>ctgry code</th><td><input type="number" name="code"></td></tr>
					<tr><th>ctgry name</th><td><input type='text' name="name"></td></tr>
					<tr><th></th><td><input type="submit" value="send"></td></tr></tr>
				</form>
				</table>
			</div>
			</div>
			<div class="panel panel-default">
            <div class="panel-heading"><strong>Add Sub Ctgry</strong></div>
            <div class="panel-body">
				<table class="table table-striped task-table">
                <form action="{{url('admin/subctgry/add')}}" method="POST">
                {{csrf_field()}}
                	<tr><th>ctgry code</th><td>
                	<select name="ctgry_code">
  					@foreach($ctgries as $ctgry => $name)
    					<option value="{{ $ctgry }}" {{old('ctgry') == $ctgry ? 'selected': ''}}>{{$name}}</option>
  					@endforeach
					</select>
                	</td></tr>
                	<tr><th>sub ctgry code</th><td><input type="number" name="code"></td></tr>
					<tr><th>sub ctgry name</th><td><input type='text' name="name"></td></tr>
					<tr><th></th><td><input type="submit" value="send"></td></tr></tr>
				</form>
                </table>
			</div>
			</div>
		</div>
	</div>
@endsection
