@extends('layouts.adminlayout')
@section('content')
<!-- failure or success message -->
@if ($msg = Session::get('status'))
    <div class="text-center">
    <font color="red"><p class="info-box">{{ $msg }}</p></font>
    </div>
@endif
<div class="container">
	<div class="home-list-header">
		<div class="col-4 offset-4">
			<h2>ICTTI/IMCEITS Library</h2>
		</div>
	</div>
<!-- current loans -->
<div class="container">
	<div class="row section-list-table">

	<table class="table table-bordered">
	<thead>
		<figcaption>
			<strong>Loan Table</strong>
		</figcaption>
			<tr>
				<th scope="col">User Name</th>
				<th scope="col">Book Title</th>
				<th scope="col">Register Date</th>
				<th scope="col">Due date</th>
				<th scope="col">Status</th>
			</tr>
	</thead>
	@if (count($loans))
	    <!-- table body -->
	    <tbody>
            @foreach ($loans as $loan)
			<tr>
				<td class="td-info">
					<div>{{ $loan->getUserName() }}</div>
				</td>
				<td class="td-info">
					<div>{{ $loan->getBookTitle() }}</div>
				</td>
				<td class="td-info">
					<div>{{ str_before($loan->registerdate, ' ') }}</div>
				</td>
				<td class="td-info">
					<div>{{ str_before($loan->duedate, ' ') }}</div>
				</td>

				<td class="td-info">
				<form action="{{ url('admin/loans/'.$loan->id)}}" method="POST">
                	{{ csrf_field() }}

				<select name="status">
  					@foreach(config('loanstatus') as $status => $name)
    					<option value="{{ $status }}" @if($loan->status == $status) selected @endif>{{$name}}</option>
  					@endforeach
					</select>
				</td>

				<!-- status change Button -->
                <td>
                    <button type="submit" class="btn btn-primary">
                    	<i class="fas fa-plus-square"></i> save
                    </button>
            	</form>
               	</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif

<div class="row">

</div>
</div>

<div class="container">
    <!-- current resevation -->
	<div class="row section-list-table">
		<table class="table table-bordered">
		<figcaption>
		<strong>Reservation Table</strong>
		</figcaption>
		<tr>
			<th>User Name</th>
			<th>Book Title</th>
			<th>Registerdate</th>
			<th>availabledate</th>
		</tr>
		@if (count($reservations))
	        <!-- table body -->
           	@foreach ($reservations as $reserve)
			<tbody>
			<tr>
				<td class="td-info">
					<div>{{ $reserve->getUserName() }}</div>
				</td>
				<td class="td-info">
					<div>{{ $reserve->getBookTitle() }}</div>
				</td>
				<td class="td-info">
					<div>{{ str_before($reserve->registerdate, ' ') }}</div>
				</td>
				<td class="td-info">
					<div>{{ str_before($reserve->availabledate, ' ') }}</div>
				</td>

			    <!-- status change Button -->
                <td>
                <form action="{{ url('/admin/reserve/'.$reserve->id)}}" method="POST">
                {{ csrf_field() }}
                   <button type="submit" class="btn btn-primary">
                      <i class="fas fa-undo-alt"></i> Cancel
                   </button>
                </form>
                </td>
			</tr>
		</tbody>
		@endforeach
		</table>
	</div>
</div>
</div>
@endif
@endsection
