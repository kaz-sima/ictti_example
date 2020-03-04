@extends('layouts.adminlayout')
@section('content')
@include('common.errors')
<!-- Bootstrap fixed code -->
<div class="panel-body">
	<div class="col-6 offset-1">
		<h2>Book Information Editing Form</h2>
	</div>
	<!-- book register form -->
	<form action="{{ url('/admin/bookupdate') }}" method="POST" class="form-horizontal" enctype='multipart/form-data'>
	{{ csrf_field() }}
		
	<div class="form-group">
        <!-- file add -->			
		<div class="col-sm-12">
       		<label>Image</label>                    			
           		<input type="file" name="book_img">
        </div>		
		<!-- book information -->
		<div class="col-sm-6">
			<label for="book" class="col-sm-3 control-label">Book</label> <input
				type="text" name="book_title" id="book-title" class="form-control"
				value="{{old('book_title', $book->book_title)}}">
				@error('book_title')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
		</div>
		<div class="col-sm-6">
			<label for="author" class="col-sm-3 control-label">price</label> <input
				type="text" name="Author" id="Author" class="form-control"
				value="{{old('Author', $book->Author)}}">
				@error('Author')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
		</div>
		<div class="col-sm-6">
			<label for="publisher" class="col-sm-3 control-label">number</label> <input
				type="text" name="publisher" id="publisher"
				class="form-control"
				value="{{old('publisher', $book->publisher)}}">
				@error('publiser')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
		</div>
		<div class="col-sm-6">
			<label for="published" class="col-sm-3 control-label">publish</label>
			<input type="date" name="published" id="published"
				class="form-control"
				value="{{old('published', str_before($book->published, ' '))}}">
				@error('publised')
    				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
		</div>
		<div class="col-sm-12">
			<label class="col-sm-1 offset-sm-1 control-label">Category</label>
			<label class="col-sm-2 control-label">Sub-Category</label>
		</div>	
		<div class="col-sm-1 offset-sm-1">
			<select class="parent" name="ctgry_id">
				@foreach($ctgries as $ctgry=>$name)
					<option value="{{ $ctgry }}" {{old('ctgry_id', $book->ctgry_id) ==$ctgry? 'selected': ''}}>{{$name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-sm-2 offset-sm-1">
			<select class="children" name="subctgry_id" disalbed>
				@foreach($subctgries as $subctgry=>$name)
  					<?php
  					if($subctgry[0] == old('subctgry_id', $book->subctgry_id)){
                          echo sprintf("<option value=%d data-parent=%d selected>%s</option>", $id[0], $id[1], $name);
  					}else{
  					   $id = explode(',', $subctgry);
                       echo sprintf("<option value=%d data-parent=%d>%s</option>", $id[0], $id[1], $name);
  					}
                    ?>
				@endforeach
			</select>
		</div>
	</div>
<script>
	$(function(){
		var $children = $('.children'); // assigning the sub-categories to the valiable
		var original = $children.html(); // keeping the original sub-category
		$('.parent').change(function() { // the event occurs when the category list is chosen
  			var val1 = $(this).val(); // assigning the value of category chosen to val1
  			$children.html(original).find('option').each(function() { // to recover the items deleted, inputting the original sub-categories
  	  			var val2 = $(this).data("parent"); // getting the value of data-parent, which is data attribute of select tag
     			if (val1 != val2) { // checking if sub-category has data-parent corresponding to the category
      				$(this).not(':first-child').remove(); // deleting the sub-categories whose data-val deffers from category
    			}
			});
			if ($(this).val() === "") { // checking if category is celected
	   			$children.prop('disabled', true); // to make sub-category disable to select
			} else {
	   			$children.prop('disabled', false);
			}
		});
	});
</script>
	</div>		
	<input type="hidden" name='lendingstatus' value='1'>
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
