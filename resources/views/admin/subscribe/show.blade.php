@extends('layouts.app')

@section('content')

<div class="row" style="text-align:center">
    <div class="col-md-12">
        <h3>Image</h3><br>
        <img src="/storage/cover_images/{{$subscribetext->image}}" style="width: 50%" alt="" />
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <h1>{{$subscribetext->title}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="well">
            {!!$subscribetext->description!!}
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-6 text-left">

            <a href="/admin/newsletters/sendall/{{$subscribetext->id}}" class="btn btn-success">Send Email To Everyone</a>

        </div>
        <div class="col-md-6" style="text-align: right">

            {!!Form::open(['action' => ['AdminSubscribeController@destroy', $subscribetext->id], 'method' => 'Post','onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

        </div>
</div>
<br><br><br>
@endsection
