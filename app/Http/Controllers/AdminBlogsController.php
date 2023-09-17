<?php

namespace App\Http\Controllers;
use File;


use App\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = $_GET['q'] ?? '';
        $no = 0;
        //
        $blogs = Blogs::orderBy('id', 'desc')->paginate(10);

        $data = [
            'authuser' => Auth::user(),
            'blogs'  => $blogs,
            'contentHeader' => 'Blogs',
            'search' => $search,
            'no' => $no
        ];

        return view('admin.blogs.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      
        $data = [
          'authuser' => Auth::user(),
          'contentHeader' => 'Blogs',
          'contentSubHeader' => 'Add Blog',
          'subCategory' => [],
          'category' => []
        ];
    
        return view('admin.blogs.create')->with($data);
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
        $ihd = date('ihd');
        $image = '';
        $slugname = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $request->input('title')));
    
        if($request->hasFile('image')) {
          $getimage = $request->file('image');
          $extension = $request->file('image')->getClientOriginalExtension();
          $path = 'uploads/blogs/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $getimage->move($path, $slugname.$ihd.'.'.$extension);
          $image = 'uploads/blogs/' . $slugname.$ihd.'.' .$extension;
        }
    
        $blog = new Blogs();
        $blog->type = $request->input('type') ?? '';
        $blog->title = $request->input('title') ?? '';
        $blog->content = $request->input('content') ?? '';
        $blog->status = $request->input('status') ?? '';
        $blog->image = $image ?? '';
        $blog->save();
    
        return redirect('/admin/blogs')->with('success', 'Blog Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blogs::find($id);

        $data = [
            'authuser' => Auth::user(),
            'contentHeader' => 'Blogs',
            'contentSubHeader' => 'Edit Blog',
            'subCategory' => [],
            'category' => [],
            'blog' => $blog
        ];

        return view('admin.blogs.edit')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ihd = date('ihd');
        $image = '';
        $slugname = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $request->input('title')));
    
        if($request->hasFile('image')) {
          $getimage = $request->file('image');
          $extension = $request->file('image')->getClientOriginalExtension();
          $path = 'uploads/blogs/';
          File::makeDirectory($path, $mode = 0777, true, true);
          $getimage->move($path, $slugname.$ihd.'.'.$extension);
          $image = 'uploads/blogs/' . $slugname.$ihd.'.' .$extension;
        }
    
        $blog = Blogs::find($id);
        $blog->type = $request->input('type') ?? '';
        $blog->title = $request->input('title') ?? '';
        $blog->content = $request->input('content') ?? '';
        $blog->status = $request->input('status') ?? '';
        $blog->image = ($image ? $image : $request->input('imageOld')) ?? '';
        $blog->save();
    
        return redirect('/admin/blogs')->with('success', 'Blog Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $blog = Blogs::find($id);
    $blog->delete();

    return redirect('/admin/blogs')->with('success', 'Blog Deleted');
    }

}
