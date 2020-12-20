@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Articles List</h2>
    </div>
    <div class="card-body">
    
        <div class="panel panle-primary">
            <div class="panel-heading">
                <h2 class="text-center" style="color: white;">ok</h2>
            </div>
            <div class="panel-body">
                
                <div class="col-md-6">
                <input type="text" name="user_id" class="form-control form-control-user" id="user_id" placeholder="User ID">
                <button class="btn btn-primary rounded" type="submit" id="search" name="search">Search<i class="fa fa-search"></i></button>
                </div>

            </div>
        </div></br>
    <!-- <h2 align="right"><a href="/createArticles" class="btn btn-primary">Create Article</a></h2> -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <!-- <th>Body</th> -->
                    <th>Create At</th>
                    <th>Tags</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dt)
                    <tr>
                        <td>{{$dt->title}}</td>
                        <td><a href="/profiles/{{$article->user_id}}">{{$dt->user->name}}</a></td>
                        <!-- <td>{{$article->body}}</td> -->
                        <td>{{$dt->created_at}}</td>
                        
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


