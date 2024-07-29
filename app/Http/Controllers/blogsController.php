<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Tag;
use Illuminate\Http\Request;

class blogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::where('status', 1)->latest()->paginate(10);
        $slider = Blogs::limit(5)->get();
        return view('blogs.index', [
            'title' => 'blogs',
            'Blogs' => $blogs,
            'caraosel' => $slider,
            'Tags' => Tag::all(),
            'categories' => Category::all(),
            'whatsApp' => Settings::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blogs::find($id);
        $recomendation = Blogs::where('category_id', $blog->category_id)->limit(3)->get();
        return view('blogs.detailBlog', [
            'blog' => $blog,
            'recomendation' => $recomendation,
            'whatsApp' => Settings::first()

        ]);
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
    }
}
