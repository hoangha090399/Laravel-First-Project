@extends('layouts.app')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Product List</h2>
        </div>
        <div class="card-body">
        <h2 align="right"><a href="/create_tag" class="btn btn-primary">Create Product</a></h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td>{{$tag->status}}</td>
                            <td>$ {{$tag->price}}</td>
                            
                            <td>
								<form  action="/tags/{{$tag->id}}" method="POST">
									@csrf
									@method('DELETE')
								
									<a href="/tags/{{$tag->id}}/edit" class="btn btn-primary">Edit</a>
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