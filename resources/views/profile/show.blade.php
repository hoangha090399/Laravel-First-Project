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
	width: 520px;
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
			<h2 class="m-0 font-weight-bold text-primary">Profile Of User: <u>{{$user->name ?? ""}}</u></h2>
		</div>
		<div class="flex-container">
			<div> <img alt="None" src="{{$profile->avatar ?? ""}}" width="150" height="150">  </div>
			<div>
				<p>&nbsp Full name &nbsp: {{$profile->full_name ?? "No info..."}}</p>
				<p>&nbsp User ID &nbsp&nbsp&nbsp&nbsp&nbsp: {{$profile->user_id ?? "No info..."}}</p>
				<p>&nbsp Birthday &nbsp&nbsp&nbsp: {{$profile->birthday ?? "No info..."}}</p>
			</div>	
		</div>
	</div>
	<div class="user_info">	
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">User Information</h2>
		</div>
		<p>&nbsp User Name : {{$user->name ?? ""}}</p>
		<p>&nbsp Email &nbsp: {{$user->email ?? ""}}</p>
		<p>&nbsp Password: {{$user->password ?? ""}}</p>
	</div>
</div>
	<div align="right">
	<a href="/profiles/createProfile/{{$user->id}}" class="btn btn-primary">Add Profile</a>
	<a href="/profiles/{{$profile->user_id ?? ""}}/edit" class="btn btn-primary">Edit</a>
	<a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
	</div>
</div>

@endsection