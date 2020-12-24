@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-9">
        <h1>{{$career->position}}</h1>
    </div>
    <div class="col-md-3">
        <a href="/admin/applicants/{{$career->id}}"><button type="normal" class="btn btn-success" style="color: white; width: 100%">Check Applications <i class="fa fa-file" style="color: white" aria-hidden="true"></i></button></a>    </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <h3>Date: <?php $data = date("d/m/Y", strtotime($career->expirationdate)); echo $data?> </h3>
        <div class="well">
            {!!$career->description!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h3>Filters:</h3>
        <ul>
            <?php
            $str = explode('","',$career->filters);
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
        <div class="col-md-4">
                <a href="/admin/careers/{{$career->id}}/edit" class="btn btn-info">Edit</a>
        </div>

        <div class="col-md-4 text-center">

            <a href="/admin/careers/sendall/{{$career->id}}" class="btn btn-success">Send Email To Everyone</a>

        </div>

                <div class="col-md-4" style="text-align: right">

            {!!Form::open(['action' => ['AdminCareersController@destroy', $career->id], 'method' => 'Post','onsubmit' => 'return ConfirmDelete()', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

        </div>
</div>
<br><br><br>
@endsection
