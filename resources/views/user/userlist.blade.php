@extends('layouts.app')

@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h2 class="m-0 font-weight-bold text-primary">User List</h2>
	</div>
	<div class="card-body">

	<form action="" class="search-bar">
		<input type="search" name="search" pattern=".*\S.*" required>
		<button class="search-btn" type="submit">
			<span>Search</span>
		</button>
	</form>
	<h2 align="right"><a href="/create_user" class="btn btn-primary">Add User</a></h2>
	
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
				<tr>
					<th>User ID</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>
								<a>{{$user->id}}</a>
							</td>
							<td>
								<a href="/profiles/{{$user->id}}">{{$user->name}}</a>
							</td>
							<td>
								<a>{{$user->email}}</a>
							</td>
						
							<td>
								<form  action="/profiles/{{$user->id}}" method="POST">
									@csrf
									@method('DELETE')
								
									<a href="/profiles/{{$user->id}}" type="submit" class="btn btn-primary">View Profile</a>
									
									<input type="submit" onclick="return confirm('Are you sure DELETE this profile')" class="btn btn-primary" value="Delete">
								</form>
							</td>
							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection





