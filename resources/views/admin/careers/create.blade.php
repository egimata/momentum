@extends('layouts.app')

@section('content')

{!! Form::open(['action' => 'AdminCareersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div>
        <h1>Create Career</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong>    {{Form::label('title', 'Job Title')}}</strong>
                            {{Form::text('title', '', ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Job Title'])}}
                    </div>
                </div>
                <div class="col-md-6">
                    <strong>    {{Form::label('expirationdate', 'Expiration Date')}}</strong><br>

                    <div id="datepicker3" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input class="form-control" name="expirationdate" type="text" readonly style="background-color: white"/>
                        <span class="input-group-addon" style="text-align:center; width:80px; background-color:#3490dc; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
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
            <div class="col-md-12">
            {{Form::label('filter', 'Filter')}}   <br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="programming-development"> Programming & Development </label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="writing-translation"> Writing & Translation</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="design-art"> Design & Art</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="administrative-secreterial"> Administrative & Secreterial</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="sales-marketing"> Sales & Marketing</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="business-finance"> Business & Finance</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="engineering-architecture"> Engineering & Architecture</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="legal"> Legal</label><br>
            <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="education-training"> Education & Training</label>
        </div>
        </div>

        <br>


{{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}

<br>
<br>
<br>
<br>

@endsection
