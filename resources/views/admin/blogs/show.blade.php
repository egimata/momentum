@extends('layouts.app')

@section('content')

<div class="row" style="text-align:center">
    <div class="col-md-9">
        <h3>Main Photo</h3><small>(the one that is shown on blog's own webpage)</small><br>
        <img src="/storage/cover_images/{{$blog->mainphoto}}" style="width: 100%" alt="" />
    </div>
    <div class="col-md-3">
        <h3>Photo</h3><small>(the one that is shown on homepage and blogs page)</small><br>
        <img src="/storage/cover_images/{{$blog->photo}}" style="width: 100%" alt="" />
    </div>
</div>
<br>
<div class="row text-center">
    <div class="col-md-4">
        <h1>{{$blog->titlealb}}</h1>
        <div class="well text-left">
            {!!$blog->descriptionalb!!}
        </div>
    </div>
    <div class="col-md-4">
        <h1>{{$blog->titlealb}}</h1>
        <div class="well text-left">
            {!!$blog->descriptionen!!}
        </div>
    </div>
    <div class="col-md-4">
        <h1>{{$blog->titleit}}</h1>
        <div class="well text-left">
            {!!$blog->descriptionit!!}
        </div>
    </div>
</div>

<br><br>
<div class="row">
        <div class="col-md-6">
                <a href="/admin/blogs/{{$blog->id}}/edit" class="btn btn-info">Edit</a>
        </div>
                <div class="col-md-6" style="text-align: right">

            {!!Form::open(['action' => ['AdminBlogsController@destroy', $blog->id], 'method' => 'Post','onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

        </div>
</div>
<br><br><br>
@endsection
