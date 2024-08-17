<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexBooking($slug)
    {
        $package_booking = Package::where('slug', $slug)->get();
        $package_id = $package_booking->first()->id;
        $package_info = Package::find($package_id);
        return view('frontend.package_booking', compact('package_info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'customer_name'=>'required|string|max:255',
         'customer_email'=>'required|email|string|max:255',
         'customer_address'=>'string|max:255',
         'customer_phone'=>'required|max:14',
         'checkout_date'=>'required',
        ]);

        Booking::insert([
            'package_id'=> $request->package_id,
            'customer_name'=>$request->customer_name,
            'customer_email'=> $request->customer_email,
            'customer_address'=> $request->customer_address,
            'customer_phone'=>$request->customer_phone,
            'checkout_date'=>$request->checkout_date,
        ]);
        return back()->with('booking_done', 'Your booking has been successfully confirmed and you will be updated by phone Call very Soon');

    }

    /**
     * Display the specified resource.
     */
    public function allBooking()
    {
        $allBooking = Booking::all();
        return view('backend.booking_list', compact('allBooking'));
    }

    public function BookingDetails($id){
        $bookingIfno = Booking::find($id)->first();
        return view('backend.booking_detals', compact('bookingIfno'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function BookingProsesing(Request $request,string $id)
    {
       Booking::find($id)->update([
        'status'=>2,
       ]);
       return back();

    }
    public function BookingComplate(Request $request,string $id)
    {
       Booking::find($id)->update([
        'status'=>3,
       ]);
       return back();

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
        //
    }
}
