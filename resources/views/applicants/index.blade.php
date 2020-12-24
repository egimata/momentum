<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>CV Europass Upload</title>
</head>
<body  style="background-image: url(./images/bg_win5.jpg); background-repeat: repeat-x;">
<font face="Arial Narrow">
<center><img src="./images/cv_top_banner1.jpg" alt="Europass CV" /></center><br/>
<HR size="2"/><br/>
    {!! Form::open(['action' => 'ApplicantsController@upload', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <input type="hidden" name="id" value="{{$career->id}}">
        <input type="hidden" name="position" value="{{$career->position}}">
        <input type="hidden" name="MAX_FILE_SIZE" value="1024000" /><b>Select file: </b>
		<input name="uploadedxml" type="file"/>
		<input type="hidden" name="upload" value="form" />
        {{Form::submit('Upload to Form', ['class' => 'btn-style-two contact-btn', 'type' => 'submit', 'name' => 'submit'] )}}

        {!! Form::close() !!}
</p>
</font>
</body>
</html>
