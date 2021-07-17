<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $blogs = Blog::where('user_id', Auth::user()->id)->get();
            return view('admin.blog.index', compact('blogs'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.blog.create');
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        DB::beginTransaction();
        try {
            $blog = new Blog();
            $blog->user_id = Auth::user()->id;
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->save();

            DB::commit();
            return redirect()->route('blogs.index')->with('message', 'Blog Created Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        try {
            return view('admin.blog.show', compact('blog'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        try {
            return view('admin.blog.edit', compact('blog'));
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($blog->id);
            $blog->name = $request->name;
            $blog->description = $request->description;
            $blog->save();

            DB::commit();
            return redirect()->route('blogs.index')->with('message', 'Blog Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find(request('ids'));
            $blog->delete();
            DB::commit();
            return response()->noContent();
        } catch (\Exception $e) {
            DB::rollback();
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    public function switchUpdate(Request $request)
    {
        try {
            $blog = Blog::find($request->ids);
            if (empty($blog->is_active)) {
                $blog->is_active = 1;
            } else {
                $blog->is_active = 0;
            }
            $blog->save();
            return response()->noContent();
        } catch (\Exception $e) {
            throw new \App\Exceptions\CustomException($e->getMessage());
        }
    }

    
}
