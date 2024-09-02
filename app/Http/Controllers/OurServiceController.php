<?php

namespace App\Http\Controllers;

use App\Models\OusService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OurServiceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $service_data = OusService::all();
        return view( 'backend.our_service.index', compact( 'service_data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'backend.our_service.create' );
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

        OusService::create( [

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

        $service_data = OusService::where('id',$id)->first();
        return view('backend.our_service.update',compact('service_data'));
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

        $service_update = OusService::where('id',$id)->first();

        $service_update->update( [

            'icon_link'   => $request->icon_link,
            'title'       => $request->title,
            'description' => $request->description,

        ] );

        Toastr::success( 'successfully update' );

        return to_route('our-service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {

        OusService::find($id)->delete();
        Toastr::success( 'delete successfully' );
        return to_route('our-service.index');
    }
}
