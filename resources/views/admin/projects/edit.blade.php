@extends('layouts.app')

@section('content')

{!! Form::open(['action' => ['AdminProjectsController@update', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div>
        <h1>Edit Project</h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-alb', 'Title Albanian')}}</strong>
                            {{Form::text('title-alb', $project->titlealb, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title Albanian'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-en', 'Title English')}}</strong>
                            {{Form::text('title-en', $project->titlen, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title English'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-it', 'Title Italian')}}</strong>
                            {{Form::text('title-it', $project->titleit, ['class' => 'form-control', 'placeholder' => 'Title Italian'])}}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-alb', 'Description Albanian')}}</strong>
                        {{Form::textarea('description-alb', $project->descriptionalb, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description Albanian'])}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-en', 'Description English')}}</strong>
                        {{Form::textarea('description-en', $project->descriptionen, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description English'])}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-it', 'Description Italian')}}</strong>
                        {{Form::textarea('description-it', $project->descriptionit, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description Italian'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            {{Form::label('filter', 'Filter')}}   <br>
            <?php
            $str = explode('","',$project->filters);
            $str[0] = str_replace('"', '', $str[0]);
            $str[count($str)-1] = str_replace('"', '', $str[count($str)-1]);
            ?>

            @if(in_array("design-marketing",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="design-marketing"> Design and Marketing</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="design-marketing"> Design and Marketing</label><br>
            @endif
            @if(in_array("events",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="events"> Events</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="events"> Events</label><br>
            @endif
            @if(in_array("branding",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="branding"> Branding</label>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="branding"> Branding</label>
            @endif
            </div>
        </div>

        <br>
        <strong> <label>Image</label> </strong> (will show on the projects page, homepage and also will be the main photo at the top when opening the project. Recommended 600x400 || MAX 1 MB)
        <div class="form-group">
            {{FORM::file('photo')}}
        </div>


        <strong> <label>Main Image</label> </strong> (will show only on the project's own webpage. Recommended 1200px width || MAX 2 MB)
        <div class="form-group">
            {{FORM::file('mainphoto')}}
        </div>
    <a href="https://imageresize.org/" target="_blank">Website for cropping and resizing the image</a><br>
    <a href="http://optimizilla.com/" target="_blank">Website for optimization and lossy compression of images</a> <br><br> </div>

        <br>
        <br>



        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}


<br>
<br>
<br>
<br>

@endsection
