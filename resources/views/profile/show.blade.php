@extends('layouts.app1')

@section('content')

<style>
	.flex-container {
	display: flex;
	flex-wrap: nowrap;
	}

	.flex-container > div {
	background-color: white;
	line-height: 75px;
	font-size: 30px;
	}

	.profile_info {
	background-color: white;
	width: 500px;
	border: 1px solid gray;
	padding: 50px;
	margin: 20px;
	}

	.user_info {
		background-color: white;
		width: 800px;
		border: 1px solid gray;
		padding: 50px;
		margin: 20px;
	}
</style>

<div class="card-body">
<div class="flex-container">
	<div class="profile_info">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">Profile Information</h2>
		</div>
		<div class="flex-container">
			<div> <img alt="avatar" src="{{$profile->avatar ?? ""}}" width="150" height="150">  </div>
			<div>
				<p>&nbsp User: {{$profile->full_name ?? ""}}</p>
				<p>&nbsp ID: {{$profile->user_id ?? ""}}</p>
				<p>&nbsp Birthday: {{$profile->birthday ?? ""}}</p>
			</div>	
		</div>
	</div>
	<div class="user_info">	
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">User Information</h2>
		</div>
		<p>&nbsp Name: {{$user->name ?? ""}}</p>
		<p>&nbsp Email: {{$user->email ?? ""}}</p>
		<p>&nbsp Password: {{$user->password ?? ""}}</p>
	</div>
</div>
	<div align="right">
	<a href="/profiles/{{$profile->id ?? ""}}/edit" class="btn btn-primary">Edit</a>
	<a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
	</div>
</div>

@endsection