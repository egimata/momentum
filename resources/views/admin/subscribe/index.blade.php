@extends('layouts.app')

@section('content')
<h1 style="display: inline-block;">All Newsletters</h1>
<a href="/admin/newsletters/create" class="btn btn-success" style="float:right">Create Newsletter</a>
<hr>

    @if(count($subscribetexts)>0)
        @foreach($subscribetexts as $subscribetext)

        <div class="well">
                <div class="row">
                    <div class="col-md-9">
                        <h3><a href="/admin/newsletters/{{$subscribetext->id}}">{{$subscribetext->title}}</a></h3>
                    </div>
                </div>
        </div>

        @endforeach
        {{$subscribetexts->links()}}
    @else
        <p>No projects found! </p>
    @endif
@endsection
