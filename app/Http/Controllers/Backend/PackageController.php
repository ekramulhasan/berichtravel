<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('backend.package.index');
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
        'selling_price' => 'required',
        'regular_price' => 'required',
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:100',
        'time' => 'required',
        'person' => 'required',
        'room' => 'required',
        'description' => 'required|string|max:10000',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);
       $title = $request->title;
       $slug = Str::lower(str_replace(' ', '-', $title)).'-'. random_int(100000, 90000000);
       $image = $request->image;
       $extension = $image->extension();
       $file_name = $title.'.'.$extension;
       Image::make($image)->resize(1200, 1200)->save(public_path('upload/package/'.$file_name));

       Package::insert([
        'selling_price'=>$request->selling_price,
        'regular_price'=>$request->regular_price,
        'title'=> $title,
        'location'=>$request->location,
        'time'=>$request->time,
        'person'=>$request->person,
        'room'=>$request->room,
        'description'=>$request->description,
        'image'=>$file_name,
        'slug'=>$slug,
        'created_at'=>Carbon::now(),
    ]);
    return back()->with('package', 'Package Create Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $packages = Package::all();
        return view('backend.package.all_package', compact('packages'));
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
        $package = Package::find($id);
        $delete_from = public_path('/upload/package/'.$package->image);
        unlink($delete_from);
        Package::find($id)->delete();
        return back()->with('package_delete', ' Delete Successfuly');
    }
}
