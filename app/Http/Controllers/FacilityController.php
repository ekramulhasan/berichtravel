<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FacilityController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $service_data = Facility::all();
        return view( 'backend.our_facility.index', compact( 'service_data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'backend.our_facility.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {

        $request->validate( [

            'icon_link'   => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ] );

        Facility::create( [

            'icon_link'   => $request->icon_link,
            'title'       => $request->title,
            'description' => $request->description,

        ] );

        Toastr::success( 'successfully added' );

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {

        $service_data = Facility::where('id',$id)->first();
        return view('backend.our_facility.update',compact('service_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {

        // dd($id);
        $request->validate( [

            'icon_link'   => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ] );

        $service_update = Facility::where('id',$id)->first();

        $service_update->update( [

            'icon_link'   => $request->icon_link,
            'title'       => $request->title,
            'description' => $request->description,

        ] );

        Toastr::success( 'successfully update' );

        return to_route('our-facility.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {

        Facility::find($id)->delete();
        Toastr::success( 'delete successfully' );
        return to_route('our-facility.index');
    }
}
