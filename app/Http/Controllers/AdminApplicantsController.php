<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use App\Applicant;
use App\Applicantedu;
use App\Applicantexp;
use App\Applicantlang;


class AdminApplicantsController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $career = Career::find($id);
        return view ('admin.applicants.show')->with('career',$career);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $applicants = Applicant::all();
        return view ('admin.applicants.index')->with('applicants',$applicants);
    }

    public function showapplicant($id)
    {
        //
        $applicant = Applicant::find($id);
        return view ('admin.applicants.showspecific')->with('applicant',$applicant);
    }


    public function changestatus(Request $request)
    {
        //
        if($request->ajax())
        {
            $id = $request->get('id');
            $value = $request->get('value');

            $applicant = Applicant::find($id);
            $applicant->status = $value;
            $applicant->save();

            return response()->json(['success' => 'Status was updated']);
        }
    }


    public function search(Request $request)
    {
        if($request->ajax())
        {
         $output = '';
         $query = $request->get('query');
         $query_sort = $request->get('query_sort');
         $status_smth = $request->get('status_smth');
         $start_date = $query[3];
         if($start_date == ""){
            $start_date = date("Y-m-d", strtotime("01-01-1500"));
         }else $start_date = date("Y-m-d", strtotime($query[3]));

         $end_date = $query[4];
         if($end_date == ""){
            $end_date = date("Y-m-d", strtotime("01-01-2500"));
         }else $end_date = date("Y-m-d", strtotime($query[4]));


         if(!array_filter($query)) {
            if($status_smth == '' || $status_smth == null){
                $data = Applicant::take(0)->get();
            }else{
                $data = Applicant::where('status', $status_smth)->get();
            }
         }else{
            if($query[1] == '' && $query[1] == null){
                if($query[2] == '' && $query[2] == null){
                    $data = Applicant::whereHas('career', function($q) use($query) {
                        $q->where('filters', 'like', '%'.$query[0].'%');
                    })->where('birthdate', '>=', $start_date)
                    ->where('birthdate', '<=', $end_date)
                    ->where('city', 'like', '%'.$query[5].'%')
                    ->where('country', 'like', '%'.$query[6].'%')
                    ->get();
                }else{
                    $data = Applicant::whereHas('career', function($q) use($query) {
                        $q->where('filters', 'like', '%'.$query[0].'%');
                    })->whereHas('applicantedus', function($q) use($query) {
                        $q->where('title', 'like', '%'.$query[2].'%');
                    })->where('birthdate', '>=', $start_date)
                    ->where('birthdate', '<=', $end_date)
                    ->where('city', 'like', '%'.$query[5].'%')
                    ->where('country', 'like', '%'.$query[6].'%')
                    ->get();
                }
            }else{
                if($query[2] == '' && $query[2] == null){
                    $data = Applicant::whereHas('career', function($q) use($query) {
                        $q->where('filters', 'like', '%'.$query[0].'%');
                    })->whereHas('applicantexps', function($q) use($query) {
                        $q->where('position', 'like', '%'.$query[1].'%');
                    })->where('birthdate', '>=', $start_date)
                    ->where('birthdate', '<=', $end_date)
                    ->where('city', 'like', '%'.$query[5].'%')
                    ->where('country', 'like', '%'.$query[6].'%')
                    ->get();
                }else{
                    $data = Applicant::whereHas('career', function($q) use($query) {
                        $q->where('filters', 'like', '%'.$query[0].'%');
                    })->whereHas('applicantexps', function($q) use($query) {
                        $q->where('position', 'like', '%'.$query[1].'%');
                    })->whereHas('applicantedus', function($q) use($query) {
                        $q->where('title', 'like', '%'.$query[2].'%');
                    })->where('birthdate', '>=', $start_date)
                    ->where('birthdate', '<=', $end_date)
                    ->where('city', 'like', '%'.$query[5].'%')
                    ->where('country', 'like', '%'.$query[6].'%')
                    ->get();
                }
            }

            $lol = 0;
            foreach($data as $datasingle){

                if ($query[8] != null && $query[8] != ""){
                    $work_start = date("Y-m-d", strtotime("2500-01-01"));
                    $work_end = date("Y-m-d", strtotime("1500-01-01"));

                    if (count($datasingle->applicantexps)>0){
                        foreach($datasingle->applicantexps as $workexp){
                            if(strtotime($workexp->start_date)<strtotime($work_start)) $work_start = $workexp->start_date;
                            if(strtotime($workexp->end_date)>strtotime($work_end)) $work_end = $workexp->end_date;
                        }

                        $date1=date_create($work_start);
                        $date2=date_create($work_end);
                        $diff=date_diff($date1,$date2);

                        if ($query[8] == '1') {
                            if(intval($diff->format("%y"))>1)  {$data->forget($lol);}
                        }else if ($query[8] == '3') {
                            if(intval($diff->format("%y"))<=1 || intval($diff->format("%y")>3))     {$data->forget($lol);}
                        }else if ($query[8] == '5') {
                            if(intval($diff->format("%y"))<=3 || intval($diff->format("%y")>5))     {$data->forget($lol);}
                        }else if ($query[8] == '8') {
                            if(intval($diff->format("%y"))<=5 || intval($diff->format("%y")>8))     {$data->forget($lol);}
                        }else if ($query[8] == '9') {
                            if(intval($diff->format("%y"))<=8)     {$data->forget($lol);}
                        }

                    }else{
                        if ($query[8] != '1')  $data->forget($lol);
                    }
                }


                if ($query[9] != null && $query[9] != ""){
                    $cnt_abilities = 0;
                    if (count($datasingle->applicantexps)>0){
                        foreach($datasingle->applicantexps as $workexp){
                            if(str_contains(strtolower($workexp->activities), $query[9])){
                                $cnt_abilities++;
                            }
                        }

                        if ($cnt_abilities == 0){
                            $data->forget($lol);
                        }
                    }else{
                        $data->forget($lol);
                    }
                }

                if ($query[10] != null && $query[10] != ""){
                    $cnt_lang = 0;
                    if (count($datasingle->applicantlangs)>0){
                        foreach($datasingle->applicantlangs as $lang){
                            if(str_contains(strtolower($lang->language), $query[10])){
                                $cnt_lang++;
                            }
                        }

                    if ($cnt_lang == 0){
                        $data->forget($lol);
                        }
                    }else{
                        $data->forget($lol);
                    }
                }

                if ($query[11] != null && $query[11] != ""){
                    $cnt_abilities = 0;
                    if (count($datasingle->applicantexps)>0){
                        foreach($datasingle->applicantexps as $workexp){
                            if(str_contains(strtolower($workexp->employer), $query[11])){
                                $cnt_abilities++;
                            }
                        }
                        if ($cnt_abilities == 0){
                            $data->forget($lol);
                        }
                    }else{
                        $data->forget($lol);
                    }
                }

                if ($query[12] != null && $query[12] != ""){
                    $cnt_abilities = 0;
                    if (count($datasingle->applicantedus)>0){
                        foreach($datasingle->applicantedus as $edu){
                            if(str_contains(strtolower($edu->org_name), $query[12])){
                                $cnt_abilities++;
                            }
                        }

                        if ($cnt_abilities == 0){
                            $data->forget($lol);
                        }
                    }else{
                        $data->forget($lol);
                    }
                }


                if ($query[13] != null && $query[13] != ""){
                    if(!str_contains(strtolower($datasingle->social_skills), $query[13])){
                        $data->forget($lol);
                    }
                }

                if ($query[14] != null && $query[14] != ""){
                    if(!str_contains(strtolower($datasingle->organisational_skills), $query[14])){
                        $data->forget($lol);
                    }
                }

                if ($query[15] != null && $query[15] != ""){
                    if(!str_contains(strtolower($datasingle->jobrelated_skills), $query[15])){
                        $data->forget($lol);
                    }
                }

                if ($query[16] != null && $query[16] != ""){
                    if(!str_contains(strtolower($datasingle->computer_skills), $query[16])){
                        $data->forget($lol);
                    }
                }

                $lol++;
            }
         }

         $total_row = $data->count();


        if($query_sort[0] == 1){
            $data = $data->sortBy('fname');
        }else if($query_sort[0] == 2){
            $data = $data->sortByDesc('fname');
        }else if($query_sort[1] == 1){
            $data = $data->sortBy('lname');
        }else if($query_sort[1] == 2){
            $data = $data->sortByDesc('lname');
        }else if($query_sort[2] == 1){
            $data = $data->sortBy('email');
        }else if($query_sort[2] == 2){
            $data = $data->sortByDesc('email');
        }else if($query_sort[3] == 1){
            $data = $data->sortBy('birthdate');
        }else if($query_sort[3] == 2){
            $data = $data->sortByDesc('birthdate');
        }else if($query_sort[4] == 1){
            $data = $data->sortBy('created_at');
        }else if($query_sort[4] == 2){
            $data = $data->sortByDesc('created_at');
        }


        if($status_smth != null && $status_smth != ""){
            $data = $data->where('status',$status_smth);
        }


         if($total_row > 0)
         {
          $cnt=1;
          foreach($data as $row)
          {
            $birthdate = date("d/m/Y", strtotime($row->birthdate));

            $status_select = "";
            if ($row->status == 0) $status_select = '<select class="form-control status" name="status" onchange="changestatuso(\'applicant_status'.$row->id.'\')" id="applicant_status'.$row->id.'">
                        <option value="0" selected>Applied</option>
                        <option value="1">Interviewed</option>
                        <option value="2">Hired</option>
                        <option value="3">On Hold</option>
                        <option value="4">Not Chosen</option>
                        </select>
                    ';
            else if ($row->status == 1) $status_select = '<select class="form-control status" name="status" onchange="changestatuso(\'applicant_status'.$row->id.'\')" id="applicant_status'.$row->id.'">
                        <option value="0">Applied</option>
                        <option value="1" selected>Interviewed</option>
                        <option value="2">Hired</option>
                        <option value="3">On Hold</option>
                        <option value="4">Not Chosen</option>
                        </select>
                    ';
            else if ($row->status == 2) $status_select = '<select class="form-control status" name="status" onchange="changestatuso(\'applicant_status'.$row->id.'\')" id="applicant_status'.$row->id.'">
                        <option value="0">Applied</option>
                        <option value="1">Interviewed</option>
                        <option value="2" selected>Hired</option>
                        <option value="3">On Hold</option>
                        <option value="">Not Chosen</option>
                        </select>
                    ';
            else if ($row->status == 3) $status_select = '<select class="form-control status" name="status" onchange="changestatuso(\'applicant_status'.$row->id.'\')" id="applicant_status'.$row->id.'">
                        <option value="0">Applied</option>
                        <option value="1">Interviewed</option>
                        <option value="2">Hired</option>
                        <option value="3" selected>On Hold</option>
                        <option value="4">Not Chosen</option>
                        </select>
                    ';
            else if ($row->status == 4) $status_select = '<select class="form-control status" name="status" onchange="changestatuso(\'applicant_status'.$row->id.'\')" id="applicant_status'.$row->id.'">
                        <option value="0" selected>Applied</option>
                        <option value="1">Interviewed</option>
                        <option value="2">Hired</option>
                        <option value="3">On Hold</option>
                        <option value="4" selected>Not Chosen</option>
                        </select>
                    ';


           $output .= '
           <tr>
            <td>'.$cnt.'</td><td>'.$row->fname.'</td><td>'.$row->lname.'</td><td>'.$row->email.'</td><td>'.$row->phone.'</td><td>'.$birthdate.'</td><td>'.$row->career->position.'</td><td>'.$row->created_at.'</td><td>'.$status_select.'</td><td><a href="/admin/applicants/specific/'.$row->id.'" target="_blank"><button type="normal" class="btn btn-info"><i class="fa fa-search" style="color: white" aria-hidden="true"></i></button></a></td>
           </tr>';
           $cnt++;
          }
         }
         else
         {
          $output = '
          <tr>
           <td colspan="20" align="center">Improve your search!</td>
          </tr>
          ';
         }

         $data = array(
            'table_data'  => $output
        );

        echo json_encode($data);
        }
       }


}
