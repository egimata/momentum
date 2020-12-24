@extends('layouts.app')

@section('content')
<h1 style="display: inline-block;">All Career Opportunities</h1>
<a href="/admin/careers/create" class="btn btn-success" style="float:right">Create Career Opportunities</a>
<hr>

    @if(count($careers)>0)
        @foreach($careers as $career)

        <div class="well">
                <div class="row">
                    <div class="col-md-9">
                        <h3><a href="/admin/careers/{{$career->id}}">{{$career->position}}</a></h3>
                        <small>Expiration Date: {{$career->expirationdate}}</small>
                    </div>
                </div>
        </div>

        @endforeach
        {{$careers->links()}}
    @else
        <p>No projects found! </p>
    @endif
@endsection
