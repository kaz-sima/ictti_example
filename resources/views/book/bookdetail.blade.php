@extends('layouts.userlayout')
@section('content')
@include('common.errors')
<div class="container">
	<div class="col-md-3">
		<h3>detailed information</h3>	
		<td class="table-text">
			<div>				
				@if($books->book_img)
					<img src="{{asset('/storage/'.$books->book_img)}}" width="50">
				@else
					-- no image --
				@endif
			</div>
			<div>Title : {{ $books->book_title }}</div>
			<div>Auther : {{ $books->Author }}</div>
			<div>Publisher : {{ $books->publisher }}</div>			
			<div>Published date : {{ str_before($books->published, " ") }}</div>
			<div>Categry : {{ $books->getCtgryData() }}</div>
			<div>Subctgry : {{ $books->getSubctgryData() }}</div>
		</td>
	</div>
</div>
@endsection
