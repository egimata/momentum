@extends('layouts.main')

@section('content')

    <!--BreadCrumb-->
    <section id="breadcrumb" class="overlay three">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 page-heading">
                    <h3>Careers</h3>
                </div>
                <div class="col-sm-6 breadcrumb-block text-right">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><a href="/careers">Careers</a></li>
                        <li class="active">{{$career->position}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!--about-->
    <section id="about" class="one space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h3>{{$career->position}}</h3>
            </div>
            <div class="col-sm-12">
                {!!$career->description!!}
            </div>
        </div>
    </section>
    <!--Contact Form-->
    <section id="contact-form" class="space">
        <div class="container">
            <!--main heading-->
            <div class="col-sm-12 main-heading text-center">
                <h4>Apply now</h4>
            </div>
            <div class="row">
                <div class="col-sm-8" style="margin: 0 auto; float: none">
                    {!! Form::open(['action' => 'ApplicantsController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'sppb-ajaxt-contact-form']) !!}

                        <input type="hidden" name="id" value="{{$career->id}}">
                        <input type="hidden" name="position" value="{{$career->position}}">

                        <input type="hidden" name="upload" value="form" />

                        <!--
                        <div class="form-group col-sm-8 padding-right">
                            <p>Upload <strong>Europass CV</strong> to have the information filled</p>
                        </div>
                        -->
                        
                        <div class="form-group col-sm-4 no-padding" style="display: none">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10240000" />
                            <input name="uploadedxml" type="file"/>
                        </div>
                        
                        {{Form::submit('Apply', ['class' => 'btn-style-two contact-btn', 'type' => 'submit', 'name' => 'submit'] )}}

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>



    @endsection
