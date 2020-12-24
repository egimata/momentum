@extends('layouts.app')

@section('content')

<h1>All Applications</h1>
<br>

<div class="row">
    <button type="normal" class="btn btn-outline-secondary" style="width:100%" id="toggle">Filter Information</button>
</div>
<div class="row panel" id="panel">
    <div class="row">
        <div class="col-md-3">
            <strong><label for="filter">Field that applied:</label></strong>
            <label class="checkbox-inline"><input type="radio" name="filter" value="programming-development"> Programming &amp; Development </label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="writing-translation"> Writing &amp; Translation</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="design-art"> Design &amp; Art</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="administrative-secreterial"> Administrative &amp; Secreterial</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="sales-marketing"> Sales &amp; Marketing</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="business-finance"> Business &amp; Finance</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="engineering-architecture"> Engineering &amp; Architecture</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="legal"> Legal</label><br>
            <label class="checkbox-inline"><input type="radio" name="filter" value="education-training"> Education &amp; Training</label>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="position">Previous Position</label></strong>
                            <input class="form-control" placeholder="Job Title" name="position" type="text" id="position">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="studies">Studies</label></strong>
                            <input class="form-control" placeholder="Field or Title" name="studies" type="text" id="studies">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <strong><label for="title">Birthdate Between</label></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div id="datepicker4" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" name="start_date" type="text" placeholder="Minimum Date" readonly style="background-color: white"/>
                            <span class="input-group-addon" style="text-align:center; width:80px; background-color:#3490dc; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div id="datepicker5" class="input-group date" data-date-format="dd-mm-yyyy">
                            <input class="form-control" name="end_date" type="text" placeholder="Maximum Date" readonly style="background-color: white"/>
                            <span class="input-group-addon" style="text-align:center; width:80px; background-color:#3490dc; color: white"><i class="fa fa-calendar-alt" style=" font-size: 25px; margin-top:5px; "aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="city">City</label></strong>
                            <input class="form-control" placeholder="City where the applicant lives" name="city" type="text" id="city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="country">Country</label></strong>
                            <input class="form-control" placeholder="Country where the applicant lives" name="country" type="text" id="country">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong><label for="years">Experience:</label></strong>
                        <select class="form-control" placeholder="Years of work" name="years" id="years">
                            <option value="">Doesn't matter</option>
                            <option value="1">0-1</option>
                            <option value="3">1-3</option>
                            <option value="5">3-5</option>
                            <option value="8">5-8</option>
                            <option value="9">8+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong><label for="status_smth">Status:</label></strong>
                        <select class="form-control" placeholder="Status" name="status_smth" id="status_smth">
                            <option value="">Doesn't matter</option>
                            <option value="0">Applied</option>
                            <option value="1">Interviewed</option>
                            <option value="2">Hired</option>
                            <option value="3">On Hold</option>
                            <option value="4">Not Chosen</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center mt-3">
        <button type="normal" class="btn btn-outline-secondary" id="toggle2">More Filters</button>
    </div>
    <div class="row panel2" id="panel2">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="abilities">Abilities \ Knowledge from previous jobs</label></strong>
                            <input class="form-control" placeholder="Usually written in the activities section" name="abilities" type="text" id="abilities">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="foreign_language">Foreign Language</label></strong>
                            <input class="form-control" placeholder="Foreign Language" name="foreign_language" type="text" id="foreign_language">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="abilities">Former employer</label></strong>
                            <input class="form-control" placeholder="Organisation where applicant used to or works now" name="former_emp" type="text" id="former_emp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="foreign_language">Former University</label></strong>
                            <input class="form-control" placeholder="Organisation where applicant used to or studies now" name="former_uni" type="text" id="former_uni">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="social_skills">Social Skills</label></strong>
                            <input class="form-control" placeholder="Searches in the Social Skills section" name="social_skills" type="text" id="social_skills">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="org_skills">Organisational Skills</label></strong>
                            <input class="form-control" placeholder="Searches in the Organisational Skills section" name="org_skills" type="text" id="org_skills">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="jobrelated_skills">Job Related Skills</label></strong>
                            <input class="form-control" placeholder="Searches in the Job Related Skills section" name="jobrelated_skills" type="text" id="jobrelated_skills">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <strong><label for="comp_skills">Computer Skills</label></strong>
                            <input class="form-control" placeholder="Searches in the Computer Skills section" name="comp_skills" type="text" id="comp_skills">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
@if (count($applicants)>0)

<p><strong>*The columns with <span style="background-color: #343a4036; border: 1px solid #343a40;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> background color are sortable.</strong></p>
<input type="hidden" id="sort_fname" value="0">
<input type="hidden" id="sort_lname" value="0">
<input type="hidden" id="sort_email" value="0">
<input type="hidden" id="sort_birthdate" value="0">
<input type="hidden" id="sort_created" value="0">
</div>
<div class="container-fluid">
<div style="overflow-x:auto">
    <table class="table mebordera">
        <thead>
            <tr>
            <th>Nr.</th>
            <th id="head_fname">First&nbsp;Name&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></th>
            <th id="head_lname">Last&nbsp;Name&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></th>
            <th id="head_email">Email&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></th>
            <th>Phone&nbsp;Number</th>
            <th id="head_birthdate">Birthdate&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></th>
            <th>Applied&nbsp;for</th>
            <th id="head_created">Created&nbsp;At&nbsp;&nbsp;<i class="far fa-arrow-alt-circle-down" aria-hidden="true"></i><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></th>
            <th>Status</th>
            <th class="paborder">Full&nbsp;Info</th>
        </thead>
        <tbody id="mushe">
    </tbody>
</table>
</div>
</div>
<br>

<br>
@endif

@endsection

@section('ajaxend')
<script>
    $(document).ready(function(){

     fetch_filtered_data();

     function fetch_filtered_data(filter = '', position = '', studies = '', start_date = '', end_date = '', city = '', country = '', status_smth = '', workexp = '', abilities = '', foreign_language = '', former_emp = '', former_uni = '', social_skills = '', org_skills = '', jobrelated_skills = '', comp_skills = '', sort_fname = '', sort_lname = '', sort_email = '', sort_birthdate = '', sort_created = '')
     {
        var query = [];

        query[0] = filter;
        query[1] = position;
        query[2] = studies;
        query[3] = start_date;
        query[4] = end_date;
        query[5] = city;
        query[6] = country;
        query[7] = '';
        query[8] = workexp;
        query[9] = abilities;
        query[10] = foreign_language;
        query[11] = former_emp;
        query[12] = former_uni;
        query[13] = social_skills;
        query[14] = org_skills;
        query[15] = jobrelated_skills;
        query[16] = comp_skills;

        var status_smth = status_smth;

        var query_sort = [];

        query_sort[0] = sort_fname;
        query_sort[1] = sort_lname;
        query_sort[2] = sort_email;
        query_sort[3] = sort_birthdate;
        query_sort[4] = sort_created;

        console.log(query_sort);

      $.ajax({
       url:"{{ route('admin.search') }}",
       method:'GET',
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
       data:{query:query,query_sort:query_sort,status_smth:status_smth},
       dataType:'json',
       success:function(data)
       {
        $('#mushe').html(data.table_data);
       },
       error: function(xhr, status, error) {
      // check status && error
         console.log(xhr.responseText);

        }

      })
    }

    $('input:radio[name="filter"]').change(function(){
        getAll();
    });

    $(document).on('keyup', '#position', function(){
        getAll();
        });

    $(document).on('keyup', '#studies', function(){
        getAll();
        });

    $(document).on('keyup', '#city', function(){
        getAll();
    });

    $(document).on('keyup', '#country', function(){
        getAll();
    });

    $('input[name="start_date"]').change(function(){
        getAll();
    });

    $('input[name="end_date"]').change(function(){
        getAll();
    });

    $('#years').change(function(){
        getAll();
    });

    $('#status_smth').change(function(){
        getAll();
    });

    $(document).on('keyup', '#abilities', function(){
        getAll();
    });

    $(document).on('keyup', '#foreign_language', function(){
        getAll();
    });

    $(document).on('keyup', '#former_emp', function(){
        getAll();
    });

    $(document).on('keyup', '#former_uni', function(){
        getAll();
    });

    $(document).on('keyup', '#social_skills', function(){
        getAll();
    });

    $(document).on('keyup', '#org_skills', function(){
        getAll();
    });

    $(document).on('keyup', '#jobrelated_skills', function(){
        getAll();
    });

    $(document).on('keyup', '#comp_skills', function(){
        getAll();
    });

    function getAll(){
        var start_date = $('input[name="start_date"]').val();
        var end_date = $('input[name="end_date"]').val();
        var filter = $('input:radio[name="filter"]:checked').val();
        var position = $('#position').val();
        var studies = $('#studies').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var status_smth =  $('#status_smth option:selected').val();
        var workexp =  $('#years option:selected').val();
        var abilities = $('#abilities').val();
        var foreign_language = $('#foreign_language').val();
        var former_emp = $('#former_emp').val();
        var former_uni = $('#former_uni').val();
        var social_skills = $('#social_skills').val();
        var org_skills = $('#org_skills').val();
        var jobrelated_skills = $('#jobrelated_skills').val();
        var comp_skills = $('#comp_skills').val();
        var sort_fname = $('#sort_fname').val();
        var sort_lname = $('#sort_lname').val();
        var sort_email = $('#sort_email').val();
        var sort_birthdate = $('#sort_birthdate').val();
        var sort_created = $('#sort_created').val();
        fetch_filtered_data(filter, position, studies, start_date, end_date, city, country, status_smth, workexp, abilities, foreign_language, former_emp, former_uni, social_skills, org_skills, jobrelated_skills, comp_skills, sort_fname, sort_lname, sort_email, sort_birthdate, sort_created);
    }

    $(document).on('click', '#head_fname', function(){
        sortme('sort_fname');
    });

    $(document).on('click', '#head_lname', function(){
        sortme('sort_lname');
    });

    $(document).on('click', '#head_email', function(){
        sortme('sort_email');
    });

    $(document).on('click', '#head_birthdate', function(){
        sortme('sort_birthdate');
    });

    $(document).on('click', '#head_created', function(){
        sortme('sort_created');
    });


function sortme(x){

$updown = 0;
if ($('#'+x).val() == 0){
    $('#'+x).val(1);
    $updown = 1;
}else if ($('#'+x).val() == 1){
    $('#'+x).val(2);
    $updown = 2;
}else if ($('#'+x).val() == 2){
    $('#'+x).val(1);
    $updown = 1;
}

if ( x == 'sort_fname'){
    if ($updown == 1){
        $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'inline');
        $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'none');
    }else if ($updown == 2){
        $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'inline');
        $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'none');
    }

    $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_email > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_email > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_created > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_created > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#sort_lname').val(0);
    $('#sort_email').val(0);
    $('#sort_birthdate').val(0);
    $('#sort_created').val(0);
}else if( x == 'sort_lname'){
    if ($updown == 1){
        $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'inline');
        $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'none');
    }else if ($updown == 2){
        $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'inline');
        $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'none');
    }

    $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_email > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_email > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_created > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_created > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#sort_fname').val(0);
    $('#sort_email').val(0);
    $('#sort_birthdate').val(0);
    $('#sort_created').val(0);
}else if( x == 'sort_email'){
    if ($updown == 1){
        $('#head_email > .fa-arrow-alt-circle-down').css('display', 'inline');
        $('#head_email > .fa-arrow-alt-circle-up').css('display', 'none');
    }else if ($updown == 2){
        $('#head_email > .fa-arrow-alt-circle-up').css('display', 'inline');
        $('#head_email > .fa-arrow-alt-circle-down').css('display', 'none');
    }

    $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_created > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_created > .fa-arrow-alt-circle-down').css('display', 'none');


    $('#sort_fname').val(0);
    $('#sort_lname').val(0);
    $('#sort_birthdate').val(0);
    $('#sort_created').val(0);
}else if( x == 'sort_birthdate'){
    if ($updown == 1){
        $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'inline');
        $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'none');
    }else if ($updown == 2){
        $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'inline');
        $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'none');
    }

    $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_email > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_email > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_created > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_created > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#sort_fname').val(0);
    $('#sort_lname').val(0);
    $('#sort_email').val(0);
    $('#sort_created').val(0);
}else if( x == 'sort_created'){
    if ($updown == 1){
        $('#head_created > .fa-arrow-alt-circle-down').css('display', 'inline');
        $('#head_created > .fa-arrow-alt-circle-up').css('display', 'none');
    }else if ($updown == 2){
        $('#head_created > .fa-arrow-alt-circle-up').css('display', 'inline');
        $('#head_created > .fa-arrow-alt-circle-down').css('display', 'none');
    }

    $('#head_fname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_fname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_lname > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_lname > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_email > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_email > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#head_birthdate > .fa-arrow-alt-circle-up').css('display', 'none');
    $('#head_birthdate > .fa-arrow-alt-circle-down').css('display', 'none');

    $('#sort_fname').val(0);
    $('#sort_lname').val(0);
    $('#sort_email').val(0);
    $('#sort_birthdate').val(0);
}

getAll();

}

});



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

function changestatuso(id){
    var status = $('#'+id).val();
    id = id.replace('applicant_status', '');
    console.log(status);
    console.log(id);

    changestatus(id,status);
}



</script>
@endsection
