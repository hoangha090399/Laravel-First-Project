@extends('layouts.app1')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Tag List</h2>
        </div>
        <div class="card-body">
        <h2 align="right"><a href="/create_tag" class="btn btn-primary">Create Tag</a></h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tag ID</th>
                        <th>Tag Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td>{{$tag->status}}</td>
                            <td>$ {{$tag->price}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection