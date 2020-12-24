<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Lang;

class ProjectsController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Lang::locale() == 'al'){
            $title = "Projektet e Momentum Group";
            $description = "Projektet tona janë gjithëpërfshirëse. Ne mund t'i bëjmë të gjitha, dhe mund ta bëjmë tani për ju.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Projects";
            $description = "Our projects are comprehensive. We can do it all, and we can do it for you now.";
        }else if (Lang::locale() == 'it'){
            $title = "I Progetti di Momentum Group";
            $description = "Our projects are comprehensive. We can do it all, and we can do it for you now.";
        }

        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects.index')->with('projects', $projects)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());
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
        $project = Project::where('slug', '=', $id)->first();

        if (Lang::locale() == 'al'){
            $title = $project->titlealb;
            $metadesc = strip_tags($project->descriptionalb);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $project->descriptionalb;
        }else if (Lang::locale() == 'en'){
            $title = $project->titlen;
            $metadesc = strip_tags($project->descriptionen);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $project->descriptionen;
        }else if (Lang::locale() == 'it'){
            $title = $project->titleit;
            $metadesc = strip_tags($project->descriptionit);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $project->descriptionit;
        }

        return view ('projects.show')->with('project',$project)->with('title',$title)->with('description',$description)->with('deschtml',$deschtml);
    }

}
