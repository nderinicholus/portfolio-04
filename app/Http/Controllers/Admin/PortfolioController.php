<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Portfolio::get();
        return view('portfolio.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
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
            'title' => 'required|unique:portfolios,title',
            'content' => 'required',
            'project_link' => 'required|url',
            'photo' => ['sometimes','image', Rule::dimensions()->maxWidth(1000)],
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        $project = new Portfolio;
        $project->title = $request->title;  
        $project->slug = Str::slug($request->title, '-');
        $project->content = $request->content;
        $project->project_link = $request->project_link;
        $project->photo = $path;

        // ddd($project);

        $project->save();

        Session::flash('success', 'Project uploaded successfully!');

        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Portfolio::findOrFail($id);
        return view('portfolio.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('project'));
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
            'content' => 'required',
            'project_link' => 'required|url',
            'photo' => ['sometimes','image', Rule::dimensions()->maxWidth(1000)],
        ]);

        // $path = $request->file('photo')->store('photos', 'public');

        $project = Portfolio::findOrFail($id);
        $project->title = $request->title;  
        $project->slug = Str::slug($request->title, '-');
        $project->content = $request->content;
        $project->project_link = $request->project_link;
        // $project->photo = $path;

        // ddd($project);

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');

            $oldfile = $project->photo;

            $project->photo = $path;

            if($oldfile) {
                Storage::disk('public')->delete($oldfile);
            }
        }

        $project->save();

        Session::flash('success', 'Project updated successfully!');

        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Portfolio::findOrFail($id);

        Storage::disk('public')->delete($project->photo);
        $project->delete();

        Session::flash('success', 'Project deleted successfully!');

        return redirect()->route('portfolio.index');
    }
}
