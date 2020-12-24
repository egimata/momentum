@extends('layouts.app')

@section('content')

<table class="table">

    <thead class="thead-dark">
        <tr>
          <th scope="col" colspan="20">Personal Information regarding {{$applicant->fname}} {{$applicant->lname}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"><strong>Ful&nbsp;Name:</strong></td>
            <td> {{$applicant->fname}} {{$applicant->lname}}</td>
        </tr>
        <tr>
            <td scope="row"><strong>E-Mail:</strong></td>
            <td> {{$applicant->email}}</td>
        </tr>
        <tr>
            <td scope="row"><strong>Phone&nbsp;Number:</strong></td>
            <td> {{$applicant->phone}}</td>
        </tr>
        <tr>
            <td scope="row"><strong>Birthdate:</strong></td>
            <td> <?php $birthdate = date("d/m/Y", strtotime($applicant->birthdate)); echo $birthdate?></td>
        </tr>
        @if(isset($applicant->mother_language))
        <tr>
            <td scope="row"><strong>Mother&nbsp;Language:</strong></td>
            <td> {{$applicant->mother_language}}</td>
        </tr>
        @endif
    </tbody>
</table>
    @if(count($applicant->applicantexps)>0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="20">Work Experience:</th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
                <th>From:</th>
                <th>To:</th>
                <th>Position:</th>
                <th>Employer:</th>
                <th>Empoloyer's&nbsp;City:</th>
                <th>Empoloyer's&nbsp;Country:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicant->applicantexps as $workexp)
            <tr>
                <td> <?php $start_date = date("d/m/Y", strtotime($workexp->start_date)); echo $start_date?></td>
                <td> <?php
                if (isset($workexp->end_date)){
                    $end_date = date("d/m/Y", strtotime($workexp->end_date)); echo $end_date;
                }else{
                    echo "Ongoing";
                };
                ?></td>
                <td> {{$workexp->position}} </td>
                <td> {{$workexp->employer}} </td>
                <td> {{$workexp->employer_city}} </td>
                <td> {{$workexp->employer_country}} </td>
            </tr>
            @if(isset($workexp->activities))
            <tr>
                <td><strong> Activities: </strong></td>
                <td colspan="20">{!!nl2br($workexp->activities)!!} </td>
            </tr>
            @endif
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if(count($applicant->applicantedus)>0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="20">Education and Training:</th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
                <th>From:</th>
                <th>To:</th>
                <th>Title:</th>
                <th>Organisation:</th>
                <th>Organisation's&nbsp;City:</th>
                <th>Organisation's&nbsp;Country:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicant->applicantedus as $edu)
            <tr>
                <td> <?php $start_date = date("d/m/Y", strtotime($edu->start_date)); echo $start_date?></td>
                <td> <?php
                if (isset($edu->end_date)){
                $end_date = date("d/m/Y", strtotime($edu->end_date)); echo $end_date;
                }else{
                    echo "Ongoing";
                }
                ?>
                </td>
                <td> {{$edu->title}} </td>
                <td> {{$edu->org_name}} </td>
                <td> {{$edu->org_city}} </td>
                <td> {{$edu->org_country}} </td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if(count($applicant->applicantlangs)>0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="20">Languages:</th>
            </tr>
        </thead>
        <thead class="thead-light">
            <tr>
                <th>Language:</th>
                <th></th>
                <th class="text-center">Listening:</th>
                <th class="text-center">Reading:</th>
                <th class="text-center">Spoken&nbsp;Interaction:</th>
                <th class="text-center">Spoken&nbsp;Production:</th>
                <th class="text-center">Writing:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicant->applicantlangs as $lang)
            <tr>
                <td colspan="2"> {{$lang->language}}</td>
                <td class="text-center"> {{$lang->listening}} </td>
                <td class="text-center"> {{$lang->reading}} </td>
                <td class="text-center"> {{$lang->spoken_interaction}} </td>
                <td class="text-center"> {{$lang->spoken_production}} </td>
                <td class="text-center"> {{$lang->writing}} </td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if(isset($applicant->social_skills) || isset($applicant->organisation_skills) || isset($applicant->jobrelated_skills) || isset($applicant->computer_skills))
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="20">Other Skills:</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($applicant->social_skills))
            <tr>
                <td><strong>Social Skills:</strong></td>
                <td> {!!nl2br($applicant->social_skills)!!}</td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
            @if(isset($applicant->organisation_skills))
            <tr>
                <td><strong>Organisation Skills:</strong></td>
                <td> {!!nl2br($applicant->organisation_skills)!!}</td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
            @if(isset($applicant->jobrelated_skills))
            <tr>
                <td><strong>Job Related Skills:</strong></td>
                <td> {!!nl2br($applicant->jobrelated_skills)!!}</td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
            @if(isset($applicant->computer_skills))
            <tr>
                <td><strong>Computer Skills:</strong></td>
                <td> {!!nl2br($applicant->computer_skills)!!}</td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
            @if(isset($applicant->other_document))
            <tr>
                <td><strong>Related Documents:</strong></td>
                <td> <a href="/storage/related_files/{{($applicant->other_document)}}" target="_blank">{{($applicant->other_document)}}</a></td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
        </tbody>
    </table>
    @endif
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" colspan="20">Other Skills:</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($applicant->other_document))
            <tr>
                <td><strong>Related Documents:</strong></td>
                <td> <a href="/storage/related_files/{{($applicant->other_document)}}" target="_blank">{{($applicant->other_document)}}</a></td>
            </tr>
            <tr>
                <td colspan="20" style="background-color:#343a4087; padding: 0.1rem"></td>
            </tr>
            @endif
        </tbody>
    </table>

<br><br>

@endsection
