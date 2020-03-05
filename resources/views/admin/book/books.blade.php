@extends('layouts.layout')
@section('content')
@include('common.errors')
<!-- current book list-->
@if (count($books) > 0)
<div class="col-6 offset-1">
	<h2>Current Book List</h2>
</div>

<!--  link to booksadd -->
<p>
	<a href="{{url('admin/booksadd')}}"><strong><font color="#130a6d">To
				Add New Book</font></strong></a>
</p>
<table class="table table-striped table-hover">
	<!-- table header -->
	<thead class="thead-dark">
		<tr>
			<th>Book Title</th>
			<th>Author</th>
			<th>Publisher</th>
			<th>Publish Date</th>
			<th></th>
			<th></th>

		</tr>
	</thead>
	<!-- table body -->
	@foreach ($books as $book)
	<tr>
		<!-- title -->
		<td class="table-text">{{ $book->book_title }}</td>
		<td class="table-text">{{ $book->Author }}</td>
		<td class="table-text">{{ $book->publisher }}</td>
		<td class="table-text">{{ str_before($book->published, ' ') }}</td>
		<!--delete button  -->

		<!--update button -->
		<td>
			<form action="{{ url('/admin/booksedit/')."/".$book->id }}" method="GET">
				{{ csrf_field() }}
				{{ method_field('edit') }}
				<button type="submit" class="btn btn-warning">
					<i class="fas fa-edit"></i> update
				</button>
			</form>
		</td>

		<td>
			<form action="{{ url('/admin/book/')."/".$book->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('delete') }}
				<button type="submit" class="btn btn-danger">
					<i class="fas fa-trash-alt"></i> delete
				</button>
			</form>
		</td>

	</tr>
	@endforeach
</table>
@endif

{{ $books->links() }}

@endsection

