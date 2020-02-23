@extends('layouts.app0')
@section('content')
    <!-- success message -->
	@if ($msg = Session::get('status'))
    	<div class="text-center">
    	<font color="green"><p class="info-box">{{ $msg }}</p></font>
    	</div>
	@endif

    <!-- current book list-->
   	@if (count($books) > 0)
		<div class="col-6 offset-1">
			<h2>Current Book List</h2>
		</div>
			<!--  link to booksadd -->
            <p><a href="{{url('booksadd')}}"><strong><font color="#130a6d">To Add New Book</font></strong></a></p>
			
            <table class="table table-striped table-hover">
            <!-- table header -->
			<thead class="thead-dark">
            	<tr>
            		<th>Book Title</th>
					<th>Author</th>
					<th>Publisher</th>
					<th>Publish Date</th>
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
                   	<td class="table-text">{{ str_before($book->published, ' ') }}
                   	<!--delete button  -->
                 	<td>
                    <form action="{{ 'book/'.$book->id }}" method="POST">
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
    <!-- the links to the pages -->
	{{ $books->links() }}
	
@endsection

