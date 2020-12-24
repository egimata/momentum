<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Applicant;
use App\Subscriber;
use Lang;

class SendMailController extends Controller
{


    function send(Request $request)
    {

        $subject = $request->name;

        foreach ($applicants as $applicant){

        Mail::to($applicant->email)->send(new SendMailCareer($data,$subject));

        }
        return back()->with('success', 'Thanks for contacting us!');

    }

    function sendCareer(Request $request)
    {

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        $subject = $request->name;

        Mail::to($request->email)->send(new SendMail($data,$subject));

        return back()->with('success', 'Thanks for contacting us!');

    }

    public function sorry($id)
    {

        $subscriber = Subscriber::find($id);
        $subscriber->subscribe = 1;
        $subscriber->save();


        if (Lang::locale() == 'al'){
            $title = "Jeni shkeputur nga Momentum Group";
            $description = "Nuk do të merrni më njoftime nga Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "You're disconnected from Momentum Group.";
            $description = "You won't be recieving anymore newsletters.";
        }else if (Lang::locale() == 'it'){
            $title = "You're disconnected from Momentum Group.";
            $description = "You won't be recieving anymore newsletters.";
        }

        return view('sorry')->with('title', $title)->with('description', $description);

    }

    public function privacy()
    {
        if (Lang::locale() == 'al'){
            $title = "Politikat e Privatësise";
            $description = "Politikat e Privatësise të Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Privacy Policies";
            $description = "Privacy Policies of Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Privacy Policies";
            $description = "Privacy Policies of Momentum Group.";
        }

        return view('privacy-policy')->with('title', $title)->with('description', $description);

    }

    public function unsubcar($id)
    {
        $applicant = Applicant::find($id);
        $applicant->subscribe = 1;
        $applicant->save();

        if (Lang::locale() == 'al'){
            $title = "Jeni shkeputur nga Momentum Group";
            $description = "Nuk do të merrni më njoftime nga Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "You're disconnected from Momentum Group.";
            $description = "You won't be recieving anymore newsletters.";
        }else if (Lang::locale() == 'it'){
            $title = "You're disconnected from Momentum Group.";
            $description = "You won't be recieving anymore newsletters.";
        }

        return view('sorry')->with('title', $title)->with('description', $description);

    }

}
