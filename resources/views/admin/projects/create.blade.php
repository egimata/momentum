@extends('layouts.app')

@section('content')

{!! Form::open(['action' => 'AdminProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div>
        <h1>Create Project</h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-alb', 'Title Albanian')}}</strong>
                            {{Form::text('title-alb', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title Albanian'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-en', 'Title English')}}</strong>
                            {{Form::text('title-en', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title English'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <strong>    {{Form::label('title-it', 'Title Italian')}}</strong>
                            {{Form::text('title-it', '', ['class' => 'form-control', 'placeholder' => 'Title Italian'])}}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-alb', 'Description Albanian')}}</strong>
                        {{Form::textarea('description-alb', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description Albanian'])}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-en', 'Description English')}}</strong>
                        {{Form::textarea('description-en', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description English'])}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description-it', 'Description Italian')}}</strong>
                        {{Form::textarea('description-it', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description Italian'])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            {{Form::label('filter', 'Filter')}}   <br>
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="design-marketing"> Design and Marketing</label><br>
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="events"> Events</label><br>
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="branding"> Branding</label>
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


{{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}

<br>
<br>
<br>
<br>

@endsection
