<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Blog;
use App\Message;
use App\Subscriber;
use Lang;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Lang::locale() == 'en'){
            $lang = "en";
            $title = "Momentum Group";
            $description = "Momentum Group operates as a holding company for a multitude of businesses, such as Restaurants, Travel Agenies, Call Centers, in addition to owning private companies. Momentum grants autonomy to its operating subsidiaries, enabling them to be competitive and effective whilst setting overall standards.";
        }else if(Lang::locale() == 'al'){
            $lang = "al";
            $title = "Momentum Group";
            $description = "Momentum Group operon si një kompani aksionere për një mori biznesesh, të tilla si Restorante, Agjenci Udhëtimesh, Call Center, me përjashtim të kompanive private. Momentum u jep autonomi filialeve të tij operativë duke u dhënë mundësinë të jenë konkurrues dhe efektivë ndërkohë që ruajnë  standardet e përgjithshme.";
        }else if(Lang::locale() == 'it'){
            $lang = "it";
            $title = "Momentum Group";
            $description = "Momentum Group operates as a holding company for a multitude of businesses, such as Restaurants, Travel Agenies, Call Centers, in addition to owning private companies. Momentum grants autonomy to its operating subsidiaries, enabling them to be competitive and effective whilst setting overall standards.";
        }
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        $projects = Project::orderBy('created_at', 'desc')->take(6)->get();
        return view('index')->with('title',$title)->with('description',$description)->with('projects',$projects)->with('blogs',$blogs)->with('lang',$lang);
    }

    public function about()
    {
        if (Lang::locale() == 'en'){
            $title = "About Us";
            $description = "Momentum Group operates as a holding company for a multitude of businesses, such as Restaurants, Travel Agenies, Call Centers, in addition to owning private companies. Momentum grants autonomy to its operating subsidiaries, enabling them to be competitive and effective whilst setting overall standards.";
        }else if(Lang::locale() == 'al'){
            $title = "Rreth Nesh";
            $description = "Momentum Group operon si një kompani aksionere për një mori biznesesh, të tilla si Restorante, Agjenci Udhëtimesh, Call Center, me përjashtim të kompanive private. Momentum u jep autonomi filialeve të tij operativë duke u dhënë mundësinë të jenë konkurrues dhe efektivë ndërkohë që ruajnë  standardet e përgjithshme.";
        }else if(Lang::locale() == 'it'){
            $title = "Su di noi";
            $description = "Momentum Group operates as a holding company for a multitude of businesses, such as Restaurants, Travel Agenies, Call Centers, in addition to owning private companies. Momentum grants autonomy to its operating subsidiaries, enabling them to be competitive and effective whilst setting overall standards.";
        }
    //    echo Lang::locale();
        return view('about')->with('title',$title)->with('description',$description);
    }

    public function store(Request $request)
    {
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->subject = $request->input('subject');
        $message->message = $request->input('comment');
        $message->confirmed = 0;
        $message->save();

        return redirect('thankyou');
    }

    public function subscribstore(Request $request)
    {
        $subscriber = new Subscriber;
        $subscriber->email = $request->input('email');
        $subscriber->save();

        return redirect('thankyou');
    }


    public function thankyou()
    {
        if (Lang::locale() == 'en'){
            $title = "Thank you";
            $description = "Thank you!";
        }else if(Lang::locale() == 'al'){
            $title = "Faleminderit";
            $description = "Faleminderit.";
        }else if(Lang::locale() == 'it'){
            $title = "Grazie";
            $description = "Grazie!";
        }

        return view('thankyou')->with('title',$title)->with('description',$description);
    }



}
