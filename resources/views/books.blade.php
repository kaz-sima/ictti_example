@extends('layouts.app0')
@section('content')
<!-- current book list-->
   	@if (count($books) > 0)
		<div class="col-6 offset-1">
<h2>Current Book List</h2>
</div>
            <table class="table table-striped table-hover">
            <!-- table header -->
			<thead class="thead-dark">
            	<tr>
            		<th>Book Title</th>
            	</tr>
			</thead>
            <!-- table body -->
            @foreach ($books as $book)
                <tr>
                	<!-- title -->
                   	<td class="table-text">{{ $book->book_title }}</td>
                </tr>
            @endforeach
			</table>
     @endif
@endsection

