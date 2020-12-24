<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Str;
use File;

class AdminBlogsController extends Controller
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
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view ('admin.blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogs.create');
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
            'photo' => 'image|required|max:1999',
            'mainphoto' => 'image|required|max:1999',
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

        $blog = new Blog;
        $blog->titlealb = $request->input('title-alb');

        $slug = Str::slug($blog->titlealb, '-');
        $count = 1;
        $slugtest = Blog::where('slug', '=', $slug)->first();
        if ($slugtest === null) {
           // slug doesn't exist
           $blog->slug = $slug;
        }else{
            while (1){
                $slugcount = $slug.'-'.$count;

                $slugtest = Blog::where('slug', '=', $slugcount)->first();

                if ($slugtest === null) {
                    // slug doesn't exist
                    $blog->slug = $slugcount;

                    break;
                 }else{
                $count++;
                }
            }
        }

        $blog->titlen = $request->input('title-en');
        $blog->titleit = $request->input('title-it');
        $blog->descriptionalb = $request->input('description-alb');
        $blog->descriptionen = $request->input('description-en');
        $blog->descriptionit = $request->input('description-it');
        $blog->photo = $fileNameToStore;
        $blog->mainphoto = $fileNameToStore1;
        $blog->save();

        return redirect('admin/blogs')->with('success', 'Blog was created');

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
        $blog = Blog::find($id);
        return view ('admin.blogs.show')->with('blog',$blog);
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
        $blog = Blog::find($id);
        return view ('admin.blogs.edit')->with('blog',$blog);
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

        $blog = Blog::find($id);

        if($request->hasFile('photo')){

            $filenameWithExt = $request->file('photo')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('photo')->getClientOriginalExtension();

            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            $path = $request->file('photo')->storeAs('public/cover_images', $fileNameToStore);

            $image_path = "storage/cover_images/".$blog->photo;

            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $blog->photo = $fileNameToStore;

        }


        if($request->hasFile('mainphoto')){

            $filenameWithExt1 = $request->file('mainphoto')->getClientOriginalName();

            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);

            $extension1 = $request->file('mainphoto')->getClientOriginalExtension();

            $fileNameToStore1= $filename1.'_'.time().'.'.$extension1;

            $path1 = $request->file('mainphoto')->storeAs('public/cover_images', $fileNameToStore1);

            $image_path1 = "storage/cover_images/".$blog->mainphoto;

            if(File::exists($image_path1)) {
                File::delete($image_path1);
            }

            $blog->mainphoto = $fileNameToStore1;

        }

        $blog->titlealb = $request->input('title-alb');

        $slug = Str::slug($blog->titlealb, '-');
        $count = 1;
        $slugtest = Blog::where('slug', '=', $slug)->first();
        if ($slugtest === null) {
           // slug doesn't exist
           $blog->slug = $slug;
        }else{
            while (1){
                $slugcount = $slug.'-'.$count;

                $slugtest = Blog::where('slug', '=', $slugcount)->first();

                if ($slugtest === null) {
                    // slug doesn't exist
                    $blog->slug = $slugcount;

                    break;
                 }else{
                $count++;
                }
            }
        }

        $blog->titlen = $request->input('title-en');
        $blog->titleit = $request->input('title-it');
        $blog->descriptionalb = $request->input('description-alb');
        $blog->descriptionen = $request->input('description-en');
        $blog->descriptionit = $request->input('description-it');
        $blog->save();


        return redirect('admin/blogs')->with('success', 'Blog was updated');

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
        $blog = Blog::find($id);

        $image_path = "storage/cover_images/".$blog->photo;
        $image_path_main = "storage/cover_images/".$blog->mainphoto;

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        if(File::exists($image_path)) {
            File::delete($image_path_main);
        }

        $blog->delete();

        return redirect('admin/blogs')->with('success', 'Blog was deleted');
    }
}
