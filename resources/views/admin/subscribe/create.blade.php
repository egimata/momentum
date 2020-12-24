@extends('layouts.app')

@section('content')

{!! Form::open(['action' => 'AdminSubscribeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div>
        <h1>Create Newsletter</h1>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <strong>    {{Form::label('title', 'Title')}}</strong>
                            {{Form::text('title', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title'])}}
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description', 'Description')}}</strong>
                        {{Form::textarea('description', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description'])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <strong>    {{Form::label('buttonurl', 'Button URL')}}</strong> <small>(Leave empty if no button)</small>
                        {{Form::text('buttonurl', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Button URL'])}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <strong>    {{Form::label('buttontext', 'Button Text')}}</strong> <small>(Leave empty if no button)</small>
                        {{Form::text('buttontext', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Button Text'])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

            <strong> <label>Image</label> </strong> (will show only on email. Recommended 1200px width || MAX 2 MB)
            <div class="form-group">
                {{FORM::file('image')}}
            </div>
        <a href="https://imageresize.org/" target="_blank">Website for cropping and resizing the image</a><br>
        <a href="http://optimizilla.com/" target="_blank">Website for optimization and lossy compression of images</a> <br><br> </div>

            <br>
            <br>

        </div>
    </div>

        <br>


{{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}

<br>
<br>
<br>
<br>

@endsection
