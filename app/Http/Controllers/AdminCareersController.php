<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Career;
use App\Applicant;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailCareer;

class AdminCareersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $careers = Career::orderBy('expirationdate', 'desc')->paginate(10);
        return view ('admin.careers.index')->with('careers',$careers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'expirationdate' => 'required',
        ]);

        $career = new Career;
        $career->position = $request->input('title');
        $career->description = $request->input('description');

        $timestamp = strtotime($request->input('expirationdate'));
        $career->expirationdate = date('Y-m-d', $timestamp);

        $var = collect($request->get("filter"))->implode('","');
        $var = '"'.$var.'"';
        $career->filters = $var;
        $career->save();

        return redirect('admin/careers')->with('success', 'Career Opportunity was created');

    }

    public function sendEmailAll($id){


        $career = Career::find($id);

        $applicants = Applicant::where('subscribe','0')->get();
        $subject = 'Vend Vakant pune tek Momentum Group';

        foreach ($applicants as $applicant){

            Mail::to($applicant->email)->send(new SendMailCareer($career,$applicant,$subject));

        }

        return redirect('admin/careers')->with('success', 'Careers E-mails were sent');
    }

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
        return view ('admin.careers.show')->with('career',$career);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $career = Career::find($id);
        return view ('admin.careers.edit')->with('career',$career);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'expirationdate' => 'required',
        ]);


        $career = Career::find($id);
        $career->position = $request->input('title');
        $career->description = $request->input('description');

        $timestamp = strtotime($request->input('expirationdate'));
        $career->expirationdate = date('Y-m-d', $timestamp);

        $var = collect($request->get("filter"))->implode('","');
        $var = '"'.$var.'"';
        $career->filters = $var;
        $career->save();

        return redirect('admin/careers')->with('success', 'Career Opportunity was created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $career = Career::find($id);
        $career->delete();

        return redirect('admin/careers')->with('success', 'Career Opportunity was deleted');

    }
}
