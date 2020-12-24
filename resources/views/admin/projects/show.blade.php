@extends('layouts.app')

@section('content')

<div class="row" style="text-align:center">
    <div class="col-md-9">
        <h3>Main Photo</h3><small>(the one that is shown on project's own webpage)</small><br>
        <img src="/storage/cover_images/{{$project->mainphoto}}" style="width: 100%" alt="" />
    </div>
    <div class="col-md-3">
        <h3>Photo</h3><small>(the one that is shown on homepage and projects page)</small><br>
        <img src="/storage/cover_images/{{$project->photo}}" style="width: 100%" alt="" />
    </div>
</div>
<br>
<div class="row text-center">
    <div class="col-md-4">
        <h1>{{$project->titlealb}}</h1>
        <div class="well text-left">
            {!!$project->descriptionalb!!}
        </div>
    </div>
    <div class="col-md-4">
        <h1>{{$project->titlealb}}</h1>
        <div class="well text-left">
            {!!$project->descriptionen!!}
        </div>
    </div>
    <div class="col-md-4">
        <h1>{{$project->titleit}}</h1>
        <div class="well text-left">
            {!!$project->descriptionit!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h3>Filters:</h3>
        <ul>
            <?php
            $str = explode('","',$project->filters);
            $str[0] = str_replace('"', '', $str[0]);
            $str[count($str)-1] = str_replace('"', '', $str[count($str)-1]);

            foreach ($str as $stringu){
            echo "<li>".$stringu."</li>";
            };
            ?>
        </ul>

    </div>
</div>
<br><br>
<div class="row">
        <div class="col-md-6">
                <a href="/admin/projects/{{$project->id}}/edit" class="btn btn-info">Edit</a>
        </div>
                <div class="col-md-6" style="text-align: right">

            {!!Form::open(['action' => ['AdminProjectsController@destroy', $project->id], 'method' => 'Post','onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

        </div>
</div>
<br><br><br>
@endsection
