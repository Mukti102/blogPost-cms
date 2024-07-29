<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\categories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blogs::where('user_id', auth()->user()->id);
        return view('dashboard.posts', [
            'blogs' => $blogs->search(request(['search']))->latest()->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'title' => ['required', 'min:5', 'max:255'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1025'],
            'content' => ['required'],
        ]);

        $validatedata['user_id'] = auth()->user()->id;
        $validatedata['status'] = $request->status;
        if ($request->status == 1) {
            $validatedata['published_at'] = now();
        }
        $validatedata['excerpt'] =  Str::limit(strip_tags($request->content), 200);

        if ($request->file('image')) {
            $validatedata['image'] = $request->file('image')->store('blogs-image');
        }

        Blogs::create($validatedata);
        Session::flash('succes', 'add new post is success');
        return redirect('/dashboard/blogs');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog)
    {
        return view('dashboard.view', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
        return view('/dashboard/edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blog)
    {
        $rules = [
            'title' => ['required', 'min:5', 'max:255'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'content' => ['required'],
        ];
        $validateData = request()->validate($rules);
        $validateData['status'] = $request->status;
        if ($request->status == 1) {
            $validateData['published_at'] = now();
        }
        // escerpt
        $validateData['excerpt'] =  Str::limit(strip_tags($request->content), 200);
        // user id
        $validateData['user_id'] = auth()->user()->id;
        // category id
        $validateData['category_id'] = $request->category_id;
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('blogs-image');
        } else {
            $validateData['image']  = $request->oldImage;
        }

        Blogs::where('id', $blog->id)->update($validateData);
        Session::flash('success', 'update is success');
        return redirect('/dashboard/blogs');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blog)
    {
        // delete image from directory
        if ($blog->image) {
            Storage::delete($blog->image);
        }

        Blogs::destroy($blog->id);
        Session::flash('success', 'delete succes');
        return redirect('/dashboard/blogs');
    }

    public function publish(Blogs $blog)
    {
        $blog->status == 0 ? $blog->status = 1 : $blog->status = 0;
        $blog->save();
        return redirect()->back()->with('success', 'publish success');
    }
}
