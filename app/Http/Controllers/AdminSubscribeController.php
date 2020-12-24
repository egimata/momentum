<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Subscriber;
use App\Subscribetext;

class AdminSubscribeController extends Controller
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
        $subscribetexts = Subscribetext::orderBy('created_at', 'desc')->paginate(10);
        return view ('admin.subscribe.index')->with('subscribetexts',$subscribetexts);

    }

    public function show($id)
    {
        //
        $subscribetext = Subscribetext::find($id);
        return view ('admin.subscribe.show')->with('subscribetext',$subscribetext);

    }

    public function create()
    {
        //
        return view ('admin.subscribe.create');

    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|required|max:1999'
        ]);


        if($request->hasFile('image')){

            $filenameWithExt = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no-image.png';
        }

        $subscribetext = new Subscribetext;
        $subscribetext->title = $request->input('title');
        $subscribetext->description = $request->input('description');
        $subscribetext->image = $fileNameToStore;
        $subscribetext->buttonurl = $request->input('buttonurl');
        $subscribetext->buttontext = $request->input('buttontext');
        $subscribetext->save();

        return redirect('admin/newsletters')->with('success', 'Newsletter was created');

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
        $subscribetext = Subscribetext::find($id);

        $image_path = "storage/cover_images/".$subscribetext->image;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $subscribetext->delete();

        return redirect('admin/newsletters')->with('success', 'Newsletter was deleted');
    }

    public function sendEmailAll($id){


        $subscribetext = Subscribetext::find($id);

        $subscribes = Subscriber::where('subscribe','0')->get();
        $subject = 'Bulletini informativ Momentum Group';

        foreach ($subscribes as $subscribe){

            Mail::to($subscribe->email)->send(new SendMail($subscribetext,$subscribe,$subject));

        }

        return redirect('admin/newsletters')->with('success', 'Newsletters E-mails were sent');
    }




}
