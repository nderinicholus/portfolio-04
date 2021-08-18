<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class PostsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostsCategory::get();
        return view('blog.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts_categories,title|max:255',

        ]);
  
        $category = new PostsCategory;
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->save();
  
        Session::flash('success', 'New Category has been created.');
  
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = PostsCategory::findOrFail($id);
        return view('blog.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = PostsCategory::findOrFail($id);
        return view('blog.category.edit', compact('category'));
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
        $this->validate($request, [
            'title' => 'required',

        ]);
  
        $category = PostsCategory::findOrFail($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->save();
  
        Session::flash('success', 'New Category has been created.');
  
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PostsCategory::find($id);
        $category->delete();

        Session::flash('success', 'The Category was deleted successfuly.');

        return redirect()->route('categories.index');
    }
}
