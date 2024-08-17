<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $all_guide = Guide::all();
        return view('backend.guide.index', compact('all_guide'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'designation' => 'required|string|max:255',
            'phone' => 'required|string|max:14',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           ]);
       $name = $request->name;
       $image = $request->photo;
       $extension = $image->extension();
       $file_name = $name.'.'.$extension;
       Image::make($image)->resize(1200, 1200)->save(public_path('upload/guide/'.$file_name));

       Guide::insert([
        'name'=>$request->name,
        'designation'=>$request->designation,
        'phone'=>$request->phone,
        'photo'=>$file_name,

       ]);

       return back()->with('guide', 'New Guide Create Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guide = Guide::find($id);
        $delete_from = public_path('/upload/guide/'.$guide->photo);
        unlink($delete_from);
        Guide::find($id)->delete();
        return back()->with('guide_delete', ' Delete Successfuly');
    }
}
