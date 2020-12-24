@extends('layouts.app')

@section('content')

{!! Form::open(['action' => ['AdminCareersController@update', $career->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div>
        <h1>Edit Career Opportunity</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong>    {{Form::label('title', 'Job Position')}}</strong>
                            {{Form::text('title', $career->position, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Title Albanian'])}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>    {{Form::label('expirationdate', 'Expiration Date')}}</strong><br>

                        <div id="datepicker4" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" name="expirationdate" type="text" value="<?php $data = date("d-m-Y", strtotime($career->expirationdate)); echo $data;?>" readonly style="background-color: white"/>
                            <span class="input-group-addon" style="text-align:center; width:80px; background-color:#3490dc; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <strong> {{Form::label('description', 'Description')}}</strong>
                        {{Form::textarea('description', $career->description, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Description'])}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            {{Form::label('filter', 'Filter')}}   <br>
            <?php
            $str = explode('","',$career->filters);
            $str[0] = str_replace('"', '', $str[0]);
            $str[count($str)-1] = str_replace('"', '', $str[count($str)-1]);
            ?>

            @if(in_array("programming-development",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="programming-development"> Programming & Development</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="programming-development"> Programming & Development</label><br>
            @endif
            @if(in_array("writing-translation",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="writing-translation"> Writing & Translation</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="writing-translation"> Writing & Translation</label><br>
            @endif
            @if(in_array("design-art",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="design-art"> Design & Art</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="design-art"> Design & Art</label><br>
            @endif
            @if(in_array("administrative-secreterial",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="administrative-secreterial"> Administrative & Secreterial</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="administrative-secreterial"> Administrative & Secreterial</label><br>
            @endif
            @if(in_array("sales-marketing",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="sales-marketing"> Sales & Marketing</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="sales-marketing"> Sales & Marketing</label><br>
            @endif
            @if(in_array("business-finance",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="business-finance"> Business & Finance</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="business-finance"> Business & Finance</label><br>
            @endif
            @if(in_array("engineering-architecture",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="engineering-architecture"> Engineering & Architecture</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="engineering-architecture"> Engineering & Architecture</label><br>
            @endif
            @if(in_array("legal",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="legal"> Legal</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="legal"> Legal</label><br>
            @endif
            @if(in_array("education-training",$str))
                <label class="checkbox-inline"><input type="checkbox" checked name="filter[]" value="education-training"> Education & Training</label><br>
            @else
                <label class="checkbox-inline"><input type="checkbox" name="filter[]" value="education-training"> Education & Training</label><br>
            @endif

            </div>
        </div>

        <br>
        <br>



        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'] )}}


<br>
<br>
<br>
<br>

@endsection
