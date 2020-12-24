<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class AdminMessagesController extends Controller
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
        $messages = Message::orderBy('created_at', 'asc')->where('confirmed', '=', 0)->get();
        return view ('admin.messages.index')->with('messages',$messages);
    }

    public function time($month, $year)
    {
        //
        if ($month == 0){
            $date1 = $year.'-1-1';
            $date2 = $year.'-12-31';
            $title = 'Messages for year '.$year;
        }else{
            $date1 = $year.'-'.$month.'-1';
            $d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
            $date2 = $year.'-'.$month.'-'.$d.'';
            $title = 'Messages for month '.$month.'/'.$year;
        }

        $messages = Message::orderBy('created_at', 'asc')->where('created_at', '>=', $date1)->where('created_at', '<=', $date2)->paginate(50);

        return view ('admin.messages.time')->with('messages',$messages)->with('title',$title);
    }


    public function all()
    {
        //
        $messages = Message::orderBy('created_at', 'asc')->paginate(50);
        $title = "All Messages";
        return view ('admin.messages.time')->with('messages',$messages)->with('title',$title);
    }

    public function confirm($id)
    {
        //
        $messages = Message::find($id);
        $messages->confirmed = 1;
        $messages->save();

        return redirect('/admin/messages')->with('success', 'Message confirmed');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }



}
