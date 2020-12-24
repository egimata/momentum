@extends('layouts.app')

@section('content')
<h1 style="display: inline-block;">All Projects</h1>
<a href="/admin/projects/create" class="btn btn-success" style="float:right;">Create Project</a>
<hr>

    @if(count($projects)>0)
        @foreach($projects as $project)

        <div class="well">
                <div class="row">
                    <div class="col-md-9">
                        <h3><a href="/admin/projects/{{$project->id}}">{{$project->titlealb}} || {{$project->titlen}} || {{$project->titleit}} </a></h3>
                        <small>Project created on: {{$project->created_at}}</small>
                    </div>
                </div>
        </div>

        @endforeach
        {{$projects->links()}}
    @else
        <p>No projects found! </p>
    @endif
@endsection
