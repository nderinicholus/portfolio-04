<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::first();

        if($setting) {
            return redirect()->route('dashboard'); 
            // return abort(404); 
        } else {
            return view('settings.create');
        }
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
            'title' => 'required|unique:settings,title',
            'body' => 'required',
            'github' => '',
            'twitter' => '',
            'linkedin' => '',
            'youtube' => '',
            'photo' => ['required','image', Rule::dimensions()->maxWidth(1000)],
            // 'photo' => 'required|image|max:1000',
        ]);

        
        $path = $request->file('photo')->store('photos', 'public');

        $setting = new Setting;
        $setting->title = $request->title;
        $setting->slug = Str::slug($request->title, '-');
        $setting->body = $request->body;
        $setting->github = $request->github;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->youtube = $request->youtube;
        $setting->photo = $path;

        // dd($path);

        $setting->save();

        Session::flash('success', 'Setting uploaded successfully!');

        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('settings.edit', compact('setting'));
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
            'body' => 'required',
            'github' => '',
            'twitter' => '',
            'linkedin' => '',
            'youtube' => '',
            'photo' => ['sometimes','image', Rule::dimensions()->maxWidth(1000)],
            // 'photo' => 'required|image|max:1000',
        ]);

        
        // $path = $request->file('photo')->store('photos', 'public');

        $setting = Setting::findOrFail($id);
        $setting->title = $request->title;
        $setting->slug = Str::slug($request->title, '-');
        $setting->body = $request->body;
        $setting->github = $request->github;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->youtube = $request->youtube;
        // $setting->photo = $path;

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');

            $oldfile = $setting->photo;

            $setting->photo = $path;

            if($oldfile) {
                Storage::disk('public')->delete($oldfile);
            }
        }


        // dd($path);

        $setting->save();

        Session::flash('success', 'Settings updated successfully!');

        return redirect()->route('settings.show', $setting->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abord(404);
        
        // $setting = Service::findOrFail($id);
        // $path = Storage::file;
        // ddd($path);

        // Storage::disk('public')->delete($setting->photo);
        // $setting->delete();

        // Session::flash('success', 'Record deleted successfully!');

        // return redirect()->route('settings.index');
    }
}
