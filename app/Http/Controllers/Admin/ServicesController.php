<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'Desc')->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'title' => 'required|unique:services,title',
            'body' => 'required',
            'photo' => ['required','image', Rule::dimensions()->maxWidth(1000)],
            // 'photo' => 'required|image|max:1000',
        ]);

        
        $path = $request->file('photo')->store('photos', 'public');

        $service = new Service;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title, '-');
        $service->body = $request->body;
        $service->photo = $path;

        // dd($path);

        $service->save();

        Session::flash('success', 'Service uploaded successfully!');

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
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
            'photo' => ['sometimes','image', Rule::dimensions()->maxWidth(1000)]
            // 'photo' => 'sometimes|image|max:1000',
            // 'photo' => 'sometimes|image|dimensions()->maxwidth(1000)',
        ]);

        
        

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->slug = Str::slug($request->title, '-');
        $service->body = $request->body;

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');

            $oldfile = $service->photo;

            $service->photo = $path;

            if($oldfile) {
                Storage::disk('public')->delete($oldfile);
            }
        }



        // ddd($service);

        $service->save();

        Session::flash('success', 'Service updated successfully!');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        // $path = Storage::file;
        // ddd($path);

        Storage::disk('public')->delete($service->photo);
        $service->delete();

        Session::flash('success', 'Service deleted successfully!');

        return redirect()->route('services.index');
    }
}
