@extends('layouts.app1')

@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h2 class="m-0 font-weight-bold text-primary">Profile List</h2>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Profile Name</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
				@foreach($profiles as $profile)
				<tr>
					<td><a href="/profiles/{{$profile->id}}">{{$profile->full_name}}</a></td>

					<td><a href="/profiles/{{$profile->id}}/edit" class="btn btn-primary">Edit</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection