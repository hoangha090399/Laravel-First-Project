@extends('layouts.app')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary">Order List</h2>
    </div>
    <div class="card-body">
                
        <div class="col-md-6">
            <input type="text" name="user_id" class="form-control form-control-user" id="user_id" placeholder="User ID">
            <button class="btn btn-primary rounded" type="submit" id="search" name="search">Search<i class="fa fa-search"></i></button>

        </div></br>
    <!-- <h2 align="right"><a href="/createArticles" class="btn btn-primary">Create Article</a></h2> -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <!-- <th>Body</th> -->
                    <!-- <th>Create At</th> -->
                    <th>Status</th>
                    <th>Products</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->title}}</td>
                        <td><a href="/profiles/{{$article->user_id}}">{{$article->user->name}}</a></td>
                        <!-- <td>{{$article->body}}</td> -->
                        <!-- <td>{{$article->created_at}}</td> -->
                        <td>{{$article->status}}</td>
                        <td>
                            @foreach($article->tags as $tag)
                                <a href="#">{{$tag->tag}} </a> ,
                                @endforeach
                        </td>
                        <th>
                            <a href="/articles/{{$article->id ?? ''}}/edit" type="submit" class="btn btn-primary">Edit</a>
                            <a href="/articles/{{$article->id ?? ''}}" type="submit" class="btn btn-primary">View</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#search").on("click",function(){
        var link = document.getElementById("user_id").value;
        $.ajax({
            url: window.location.href="getData/" + link
        });
    });
</script>
@endsection


