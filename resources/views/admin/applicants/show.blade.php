@extends('layouts.app')

@section('content')
<link href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<h1>Applications for {{$career->position}}</h1>
<br>

@if (count($career->applicants)>0)

<table class="table" id="selectedColumn">
        <thead>
            <tr>
            <th>Nr.</th>
            <th>First&nbsp;Name</th>
            <th>Last&nbsp;Name</th>
            <th>Email</th>
            <th>Phone&nbsp;Number</th>
            <th>Birthdate</th>
            <th>Created&nbsp;At</th>
            <th>Status</th>
            <th class="paborder">Full Info</th>
        </thead>
        <tbody>

            <?php $cnt=1;?>
            @foreach($career->applicants as $applicant)
            <tr>
                <td>{{$cnt}}</td>
                <td>{{$applicant->fname}}</td>
                <td>{{$applicant->lname}}</td>
                <td>{{$applicant->email}}</td>
                <td>{{$applicant->phone}}</td>
                <td><?php $birthdate = date("d/m/Y", strtotime($applicant->birthdate)); echo $birthdate?></td>
                <td>{{$applicant->created_at}}</td>
                <td>
                    <?php
                    if ($applicant->status == 0) echo '<select class="form-control status" name="status" id="applicant_status'.$applicant->id.'">
                                                            <option value="0" selected>Applied</option>
                                                            <option value="1">Interviewed</option>
                                                            <option value="2">Hired</option>
                                                            <option value="3">On Hold</option>
                                                            <option value="4">Not Chosen</option>
                                                            </select>
                                                        ';
                    else if ($applicant->status == 1) echo '<select class="form-control status" name="status" id="applicant_status'.$applicant->id.'">
                                                            <option value="0">Applied</option>
                                                            <option value="1" selected>Interviewed</option>
                                                            <option value="2">Hired</option>
                                                            <option value="3">On Hold</option>
                                                            <option value="4">Not Chosen</option>
                                                            </select>
                                                        ';
                    else if ($applicant->status == 2) echo '<select class="form-control status" name="status" id="applicant_status'.$applicant->id.'">
                                                            <option value="0">Applied</option>
                                                            <option value="1">Interviewed</option>
                                                            <option value="2" selected>Hired</option>
                                                            <option value="3">On Hold</option>
                                                            <option value="">Not Chosen</option>
                                                            </select>
                                                        ';
                    else if ($applicant->status == 3) echo '<select class="form-control status" name="status" id="applicant_status'.$applicant->id.'">
                                                            <option value="0">Applied</option>
                                                            <option value="1">Interviewed</option>
                                                            <option value="2">Hired</option>
                                                            <option value="3" selected>On Hold</option>
                                                            <option value="4">Not Chosen</option>
                                                            </select>
                                                        ';
                    else if ($applicant->status == 4) echo '<select class="form-control status" name="status" id="applicant_status'.$applicant->id.'">
                                                            <option value="0" selected>Applied</option>
                                                            <option value="1">Interviewed</option>
                                                            <option value="2">Hired</option>
                                                            <option value="3">On Hold</option>
                                                            <option value="4" selected>Not Chosen</option>
                                                            </select>
                                                        ';
                    ?>
                    </td>
                <td><a href="/admin/applicants/specific/{{$applicant->id}}" target="_blank"><button type="normal" class="btn btn-info"><i class="fa fa-search" style="color: white" aria-hidden="true"></i></button></a></td>
            </tr>
            <?php $cnt++; ?>
            @endforeach
    </tbody>
</table>

<br><br>
@endif

@endsection

@section('ajaxend')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {


$('#selectedColumn').DataTable({
    "aaSorting": [],
    columnDefs: [{
    orderable: false,
    targets: 4,
    },{
    orderable: false,
    targets: 7,
    },{
    orderable: false,
    targets: 8,
    }
    ],
    "paging":   false,
    "info":     false
});
  $('.dataTables_length').addClass('bs-select');




function changestatus(id = '', value = '')
{

 $.ajax({
  url:"{{ route('admin.changestatus') }}",
  method:'GET',
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
  data:{id:id,value:value},
  dataType:'json',
  success:function(data)
  {
    alert(data.success);
  },
  error: function(xhr, status, error) {
 // check status && error
    console.log(xhr.responseText);

   }

 })
}

$(".status").on('change', function() {
    var status = $(this).val();
    var id = $(this).attr("id");
    id = id.replace('applicant_status', '');
    console.log(status);
    console.log(id);

    changestatus(id,status);
});


});




</script>
@endsection
