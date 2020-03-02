@extends('layouts.userlayout')
@section('content')
<!-- success and reason not done message-->
@include('common.message')
	<div id="form_page">
		<div class="container">			
			<!-- ********** Search Bar ********** -->
			<div class="row section-search-bar">
				<form method="GET" action="{{url('/book')}}">
					{{ csrf_field() }}
					<div class="row search-bar">
						<i class="fas fa-search fa-2x"></i>
						<input type="text" name="title" value="{{old('title')}}" placeholder="Title">							
							<select class="parent" name="ctgry">
								@foreach($ctgries as $ctgry =>$name)
									<option value="{{ $ctgry }}" {{old('ctgry') ==$ctgry? 'selected': ''}}>{{$name}}</option>
								@endforeach
							</select>							
							<select class="children" name="subctgry" disabled>
								@foreach($subctgries as $subctgry => $name)
  									<?php
  					                if($subctgry[0] == old('subctgry')){ // to show selected subcategory if validation error occurs 
                                        echo sprintf("<option value=%d data-parent=%d selected>%s</option>", $id[0], $id[1], $name);
  					                }else{
  						                $id = explode(',', $subctgry);
                                        echo sprintf("<option value=%d data-parent=%d>%s</option>", $id[0], $id[1], $name);
  					                }
                                    ?>
								@endforeach
							</select>
						<input type="submit" value="search">
					</div>
				</form>
			</div>
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
	<!-- current books -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>Current Books</strong>
		</div>
		<div class="panel-body">
			<table class="table table-striped task-table">
				<!-- table header -->
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th>Publisher</th>
					<th>Piblished</th>
					<th>Category</th>
				</tr>

				<!-- table body -->
				<tbody>
					@foreach ($books as $book)
					<!-- book title -->
					<tr>
						<td class="td-info">
							<div>{{ $book->book_title }}</div>
						</td>						
						<td class="td-info">
							<div>{{ $book->Author }}</div>
						</td>
						<td class="td-info">
							<div>{{ $book->publisher }}</div>
						</td>
						<td class="td-info">
							<div>{{ str_before($book->published, " ") }}</div>
						</td>
						<td class="td-info">
							<div>{{ $book->getCtgryData() }}.{{ $book->getSubctgryData() }}</div>
						</td>
						
						<!-- Book : Detail Button -->
						<td>
							<form action="{{ url('/book/detail/'.$book->id) }}"
								method="POST">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-info-alt"></i>detail
								</button>
							</form>
						</td>

						<!-- Book : Borrow Button -->
						@if ( $book->lendingstatus > 0 )
						<td>
							<form action="{{ url('/book/borrow/'.$book->id) }}"
								method="POST">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-shopping-cart-alt"></i>borrow
								</button>
							</form>
						</td>
						@elseif ( $book->lendingstatus == 0 )
						<!-- Book : reservation Button -->
						<td>
							<form action="{{ url('/book/reservation/'.$book->id) }}"
								method="POST">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-primary">
									<i class="glyphicon"></i>reservation
								</button>
							</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">{{ $books->appends(request()->input())->links() }}</div>
	</div>
</div>
@endsection
