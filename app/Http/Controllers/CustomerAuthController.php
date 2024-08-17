<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.customer_login');
    }
    public function customerRegister()
    {
        return view('frontend.customer_registration');
    }

    public function customerProfile(){
        return view('frontend.customer_profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
       $request->validate([
         'name'=>'required|string|max:255',
         'email'=>'required|email|string|max:255|unique:customers',
         'password'=>'required|confirmed|'
       ]);

       Customer::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
       ]);

       if(Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password])){
        return redirect()->route('customer.profile');
       }

    }

    /**
     * Display the specified resource.
     */
    public function settings()
    {
        return view('frontend.profile_settings');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function customerProfileUpdate(Request $request)
    {
        $request->validate([
           'name'=>'string|max:255',
           'email'=>'email|string|max:255|unique:customers',
           'phone'=>'max:14',
           'address'=>'string|max:114',
           'city'=>'string|max:114',

        ]);



        Customer::find(Auth::guard('customer')->user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'city'=>$request->city,

        ]);
        return back()->with('success_up', 'Successfuly Update Your Info');

    }

    public function customerPhotoUpdate(Request $request)
    {
        $request->validate([
           'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if(Auth::guard('customer')->user()->photo != Null){
            $delete_from = public_path('upload/user/'.Auth::guard('customer')->user()->photo);
            unlink($delete_from);
        }

        $photo = $request->photo;
        $exten = $photo->extension();
        $file_name =  time().'.'.$exten;
        Image::make($photo)->resize(500, 400)->save(public_path('upload/user/'.$file_name));
        Customer::find(Auth::guard('customer')->user()->id)->update([
            'photo'=> $file_name,
        ]);
        return back()->with('profile_photo','successfully Your profile photo updated');
    }
    /**
     * Update the specified resource in storage.
     */
    public function customerLogin(Request $request)
    {
        if(Customer::where('email', $request->email)->exists()){
            if(Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password])){
                return redirect()->route('customer.profile');
               }
               else{
                return back()->with('password', 'Wrong Password');
               }
        }
        else{
            return back()->with('email', 'This Email Does Not Exist' );
        }
    }

    public function customerLogout(){
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
