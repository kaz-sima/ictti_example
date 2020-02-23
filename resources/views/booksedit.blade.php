@extends('layouts.app0')
@section('content')
@include ('common.errors')
   <!-- Bootstrap fixed code -->
   <div class="panel-body">
<div class="col-6 offset-1">
<h2>Book Data Editing Form</h2>
</div>
   <!-- book register form -->
   <form action="{{ url('bookupdate') }}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
   {{ csrf_field() }}

       <div class="form-group">
         <div class="col-sm-6">
            <label for="book" class="col-sm-3 control-label">Book</label>
            <input type="text" name="book_title" id="book-title" class="form-control" value="{{old('book_title', $book->book_title)}}">
         	@error('book_title')
    			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
         </div>
         <div class="col-sm-6">
				<label for="author" class="col-sm-3 control-label">Author</label>
				<input type="text" name="Author" id="Author" class="form-control"
					value="{{old('Author', $book->Author)}}">
					@error('Author')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
			<div class="col-sm-6">
				<label for="publisher" class="col-sm-3 control-label">Publisher</label>
				<input type="text" name="publisher" id="publisher" class="form-control"
				value="{{old('publisher', $book->publisher)}}">
					@error('publiser')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
			<div class="col-sm-6">
				<label for="published" class="col-sm-3 control-label">Publish Date</label>
				<input type="date" name="published" id="published" class="form-control"
				value="{{old('published', str_before($book->published, ' '))}}">
					@error('publised')
    					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
			</div>
     </div>
	<input type="hidden" name='id' value="{{$book->id}}">
     <!-- register button -->
     <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
           <button type="submit" class="btn btn-primary">
             <i class="fas fa-plus-square" aria-hidden="true"></i> Save
           </button>
        </div>
      </div>
   </form>
@endsection
