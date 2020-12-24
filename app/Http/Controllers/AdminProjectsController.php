<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Str;
use File;

class AdminProjectsController extends Controller
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
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        return view ('admin.projects.index')->with('projects',$projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.projects.create');
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
            'title-en' => 'required',
            'title-alb' => 'required',
            'description-en' => 'required',
            'description-alb' => 'required',
            'photo' => 'image|required|max:999',
            'mainphoto' => 'image|required|max:1999'
        ]);


        if($request->hasFile('mainphoto')){

            $filenameWithExt = $request->file('mainphoto')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('mainphoto')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('mainphoto')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no-image.png';
        }

        if($request->hasFile('photo')){

            $filenameWithExt1 = $request->file('photo')->getClientOriginalName();

            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);

            $extension1 = $request->file('photo')->getClientOriginalExtension();

            $fileNameToStore1= $filename1.'_'.time().'.'.$extension1;

            $path1 = $request->file('photo')->storeAs('public/cover_images', $fileNameToStore1);
        } else {
            $fileNameToStore1 = '';
        }

        $project = new Project;
        $project->titlealb = $request->input('title-alb');

        $slug = Str::slug($project->titlealb, '-');
        $count = 1;
        $slugtest = Project::where('slug', '=', $slug)->first();
        if ($slugtest === null) {
           // slug doesn't exist
           $project->slug = $slug;
        }else{
            while (1){
                $slugcount = $slug.'-'.$count;

                $slugtest = Project::where('slug', '=', $slugcount)->first();

                if ($slugtest === null) {
                    // slug doesn't exist
                    $project->slug = $slugcount;

                    break;
                 }else{
                $count++;
                }
            }
        }

        $project->titlen = $request->input('title-en');
        $project->titleit = $request->input('title-it');
        $project->descriptionalb = $request->input('description-alb');
        $project->descriptionen = $request->input('description-en');
        $project->descriptionit = $request->input('description-it');
        $project->photo = $request->input('description-it');
        $project->mainphoto = $request->input('description-it');

        $var = collect($request->get("filter"))->implode('","');
        $var = '"'.$var.'"';

        $project->filters = $var;
        $project->save();

        return redirect('admin/projects')->with('success', 'Project was created');

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
        $project = Project::find($id);
        return view ('admin.projects.show')->with('project',$project);
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
        $project = Project::find($id);
        return view ('admin.projects.edit')->with('project',$project);
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
            'title-en' => 'required',
            'title-alb' => 'required',
            'description-en' => 'required',
            'description-alb' => 'required',
        ]);

        $project = Project::find($id);

        if($request->hasFile('photo')){

            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('photo')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/cover_images', $fileNameToStore);

            $image_path = "storage/cover_images/".$project->photo;

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $project->photo = $fileNameToStore;

        }


        if($request->hasFile('mainphoto')){

            $filenameWithExt1 = $request->file('mainphoto')->getClientOriginalName();

            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);

            $extension1 = $request->file('mainphoto')->getClientOriginalExtension();

            $fileNameToStore1= $filename1.'_'.time().'.'.$extension1;

            $path1 = $request->file('mainphoto')->storeAs('public/cover_images', $fileNameToStore1);

            $image_path1 = "storage/cover_images/".$project->mainphoto;

            if(File::exists($image_path1)) {
                File::delete($image_path1);
            }

            $project->mainphoto = $fileNameToStore1;

        }

        $project->titlealb = $request->input('title-alb');

        $slug = Str::slug($project->titlealb, '-');
        $count = 1;
        $slugtest = Project::where('slug', '=', $slug)->first();
        if ($slugtest === null) {
           // slug doesn't exist
           $project->slug = $slug;
        }else{
            while (1){
                $slugcount = $slug.'-'.$count;

                $slugtest = Project::where('slug', '=', $slugcount)->first();

                if ($slugtest === null) {
                    // slug doesn't exist
                    $project->slug = $slugcount;

                    break;
                 }else{
                $count++;
                }
            }
        }

        $project->titlen = $request->input('title-en');
        $project->titleit = $request->input('title-it');
        $project->descriptionalb = $request->input('description-alb');
        $project->descriptionen = $request->input('description-en');
        $project->descriptionit = $request->input('description-it');

        $var = collect($request->get("filter"))->implode('","');
        $var = '"'.$var.'"';

        $project->filters = $var;
        $project->save();

        return redirect('admin/projects')->with('success', 'Project was updated');

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
        $project = Project::find($id);

        $image_path = "storage/cover_images/".$project->photo;
        $image_path_main = "storage/cover_images/".$project->mainphoto;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        if(File::exists($image_path)) {
            File::delete($image_path_main);
        }

        $project->delete();

        return redirect('admin/projects')->with('success', 'Project was deleted');
    }
}
