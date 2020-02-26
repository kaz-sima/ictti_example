@extends('layouts.adminlayout')
@section('content')
@include('common.errors')
<!-- Bootstrap fixed code -->
<div class="panel-body">
	<div class="col-6 offset-1">
		<h2>Book Information Editing Form</h2>
	</div>
	<!-- book register form -->
	<form action="{{ url('/admin/bookupdate') }}" method="POST"
		class="form-horizontal">
		{{ csrf_field() }}
		<!-- book information -->
		<div class="form-group">
			<div class="col-sm-6">
				<label for="book" class="col-sm-3 control-label">Book</label> <input
					type="text" name="book_title" id="book-title" class="form-control"
					value="{{old('book_title', $book->book_title)}}">
			</div>
			<div class="col-sm-6">
				<label for="author" class="col-sm-3 control-label">price</label> <input
					type="text" name="Author" id="Author" class="form-control"
					value="{{old('Author', $book->Author)}}">
			</div>
			<div class="col-sm-6">
				<label for="publisher" class="col-sm-3 control-label">number</label> <input
					type="text" name="publisher" id="publisher"
					class="form-control"
					value="{{old('publisher', $book->publisher)}}">
			</div>
			<div class="col-sm-6">
				<label for="published" class="col-sm-3 control-label">publish</label>
				<input type="date" name="published" id="published"
					class="form-control"
					value="{{old('published', str_before($book->published, ' '))}}">
			</div>
		</div>
		<input type="hidden" name='id' value="{{$book->id}}">
		<!-- register button -->
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-plus-square" aria-hidden="true"></i> save
				</button>
			</div>
		</div>
	</form>
@endsection
