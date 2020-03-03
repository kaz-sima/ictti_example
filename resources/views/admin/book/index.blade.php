@extends('layouts.adminlayout')
@section('content')
@include('common.errors')
<div id="form_page">
	<div class="container">
		<div class="home-list-header">
			<div class="col-4 offset-4">
				<h2>ICTTI/IMCEITS Library</h2>
			</div>
		</div>
		<p><a href="{{ url('/admin/booksadd')}}"><strong><font color="#130a6d">To Add New Book</font></strong></a>&nbsp;</p>
	</div>
</div>

{{ $dataTable->table() }}
@endsection
@push('scripts')
<link rel="stylesheet" href="{{asset('Buttons-1.5.6/css/buttons.dataTables.min.css')}}">
<script src="{{asset('Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables/buttons.server-side.js')}}"></script>
{{ $dataTable->scripts() }}
@endpush
