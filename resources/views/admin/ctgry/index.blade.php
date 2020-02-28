@extends('layouts.adminlayout')
@section('content')
	<div id="form_page">
			<div class="container">
				<div class="home-list-header">
					<div class="row">
						<div class="col-4 offset-4">
							<h2>Current Category List</h2>
						</div>
					</div>
				</div>
<a href="{{ url('admin/ctgry/add')}}"><strong>To Add New ctgry</strong></a>&nbsp;
           <div class="panel panel-default">
           <div class="panel-body">
                <table class="table table-striped task-table">
                <tr><th>Ctgry(code)</th><th>Subctgry(code)</th></tr>
                @foreach ($items as $item)
                    <tr>
						<td>{{ $item->getData() }}</td>
						<td>
							@if ($item->subctgries != null)
								<table width="100%">
								@foreach ($item->subctgries as $obj)
									<tr><td>{{$obj->getData()}}</td></tr>
								@endforeach
								</table>
							@endif
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
</div>
@endsection

