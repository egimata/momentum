<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Lang;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Lang::locale() == 'al'){
            $title = "Blog Momentum Group";
            $description = "Artikuj nga Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Blog";
            $description = "Articles from Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Il Blog di Momentum Group";
            $description = "Articoli da Momentum Group.";
        }

        $latestblogs = Blog::orderBy('created_at', 'desc')->take(6)->get();

        $blogs = Blog::orderBy('created_at', 'desc')->paginate(3);
        return view('blogs.index')->with('blogs', $blogs)->with('latestblogs', $latestblogs)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());

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
        $blog = Blog::where('slug', '=', $id)->first();

        if (Lang::locale() == 'al'){
            $title = $blog->titlealb;
            $metadesc = strip_tags($blog->descriptionalb);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $blog->descriptionalb;
        }else if (Lang::locale() == 'en'){
            $title = $blog->titlen;
            $metadesc = strip_tags($blog->descriptionen);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $blog->descriptionen;
        }else if (Lang::locale() == 'it'){
            $title = $blog->titleit;
            $metadesc = strip_tags($blog->descriptionit);
            $description = substr($metadesc, 0, 150);
            $description = $description.'...';
            $deschtml = $blog->descriptionit;
        }

        return view ('blogs.show')->with('blog',$blog)->with('title',$title)->with('description',$description)->with('deschtml',$deschtml);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function search($slug)
    {

        //
        if (Lang::locale() == 'al'){
            $title = "Blog Momentum Group";
            $description = "Artikuj nga Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Blog";
            $description = "Articles from Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Il Blog di Momentum Group";
            $description = "Articoli da Momentum Group.";
        }

        $latestblogs = Blog::orderBy('created_at', 'desc')->take(6)->get();

        $blogs = Blog::where('slug', 'LIKE', "%{$slug}%")->orderBy('created_at', 'desc')->paginate(3);
        return view('blogs.index')->with('blogs', $blogs)->with('latestblogs', $latestblogs)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());

    }

}
