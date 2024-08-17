<?php

namespace App\Http\Controllers\Backend;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edite()
    {
        return view('backend.edit_admin_profile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_user( Request $request)
    {


    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
    ];
    $validatedData = $request->validate($rules);
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

     User::find(Auth::id())->update([
        'name'=>$request->name,
        'email'=>$request->email,

    ]);
    return back()->with('success', 'Successfuly Update Your Info');

    }

    public function changes_pass(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

    if (!Hash::check($validatedData['current_password'], $user->password)) {
    return redirect()->back()->withErrors(['current_password' => 'The provided current password does not match your actual password.']);
    }

    $user->password = Hash::make($validatedData['password']);
    $user->save();

    return back()->with('success_pass', 'Password updated successfully!');


    }

    public function profile_photo(Request $request)
    {

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if(Auth::user()->profile_photo != Null){
            $delete_from = public_path('upload/user/'.Auth::user()->profile_photo);
            unlink($delete_from);

        }

        $photo = $request->profile_photo;
        $exten = $photo->extension();
        $file_name = Auth::id().'.'.$exten;
        Image::make($photo)->resize(500, 400)->save(public_path('upload/user/'.$file_name));
        User::find(Auth::id())->update([
            'profile_photo'=> $file_name,
        ]);
        return back()->with('profile_photo','successfully Your profile photo updated');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


     // for logout
     public function admin_logout( Request $request ) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Toastr::success( 'successfully logout' );
        return redirect()->route( 'home' );

    }
}
