@extends('layouts.app')

@section('content')

<h1>Messages</h1>
<hr><br>
@if (!$messages->isEmpty())

<table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Created At</th>
            <th>Confirm</th>
            </tr>
        </thead>
        <tbody>

            @foreach($messages as $message)
            <tr>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->comment}}</td>
                <td>{{$message->created_at}}</td>
                <td><a href="/admin/confirmmessage/{{$message->id}}" class="btn btn-success">&#10004;</a>  </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br><br>
@endif
<div class="row">
    <div class="col-md-8">
<div id="datepicker1" class="input-group date" data-date-format="dd-mm-yyyy" style="width: 70%; float:left;">
        <input class="form-control" name="datemonth" type="text" readonly style="background-color: white"/>
        <span class="input-group-addon" style="text-align:center; width:80px; background-color:#6cb2eb; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
    </div>
</div>

<div class="col-md-4">

    <a href="#" onclick="changedatemonth()" class="btn btn-info" style="margin-left: 90px; width:210px">Check Monthly Requests</a>
</div>
</div>


    <br><hr><br>
    <div class="row">
            <div class="col-md-8">

    <div id="datepicker2" class="input-group date" data-date-format="dd-mm-yyyy" style="width: 70%; float:left;">
        <input class="form-control" name="dateyear" type="text" readonly style="background-color: white"/>
        <span class="input-group-addon" style="text-align:center; width:80px; background-color:#6cb2eb; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
    </div>
</div>
<div class="col-md-4">

    <a href="#" onclick="changedateyear()" class="btn btn-info" style="margin-left: 90px; width:210px">Check Yearly Requests</a>
</div>
</div>

    <br><br>
<br><br>
<h3>All Requests</h3> <hr>
<a href="/admin/messages/all" class="btn btn-info" style="float:left;">Check All</a>
<br><br>

<script>

    function changedatemonth(){
        var data = document.getElementsByName('datemonth')[0].value;
        location.replace('/admin/messages/'+data);
    }

    function changedateyear(){
        var data = document.getElementsByName('dateyear')[0].value;
        location.replace('/admin/messages/0/'+data);
    }
</script>

@endsection
