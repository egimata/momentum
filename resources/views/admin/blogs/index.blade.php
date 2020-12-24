@extends('layouts.app')

@section('content')
<h1 style="display: inline-block;">All Blogs</h1>
<a href="/admin/blogs/create" class="btn btn-success" style="float:right;">Create Blog</a>
<hr>

    @if(count($blogs)>0)
        @foreach($blogs as $blog)

        <div class="well">
                <div class="row">
                    <div class="col-md-9">
                        <h3><a href="/admin/blogs/{{$blog->id}}">{{$blog->titlealb}} || {{$blog->titlen}} || {{$blog->titleit}} </a></h3>
                        <small>Blog created on: {{$blog->created_at}}</small>
                    </div>
                </div>
        </div>

        @endforeach
        {{$blogs->links()}}
    @else
        <p>No blogs found! </p>
    @endif
@endsection
