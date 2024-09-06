<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $destination_data = Destination::latest( 'id' )->select( ['id', 'country_name', 'off_per', 'img'] )->paginate();
        return view( 'backend.destination.index', compact( 'destination_data' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'backend.destination.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {

        // dd($request);

        $request->validate( [

            'country_name' => 'bail|required|string|max:255',
            'off_per'      => 'bail|required|string|max:255',
            'country_img'  => 'bail|required|image',

        ] );

        $destination = Destination::create( [

            'country_name' => $request->country_name,
            'off_per'      => $request->off_per,

        ] );

        $this->img_upload( $request, $destination->id );

        Toastr::success( 'successfully added new testimonial' );
        return redirect()->route( 'destination.index' );

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {

        $destination_data = Destination::find( $id );
        return view( 'backend.destination.edit', compact( 'destination_data' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {

        $update_destination = Destination::find( $id );

        $request->validate( [

            'country_name' => 'bail|required|string|max:255',
            'off_per'      => 'bail|required|string|max:255',
            'country_img'  => 'bail|required|image',

        ] );

        $update_destination->update( [

            'country_name' => $request->country_name,
            'off_per'      => $request->off_per,

        ] );

        $this->img_upload( $request, $update_destination->id );

        Toastr::success( 'successfully update destination' );
        return redirect()->route( 'destination.index' );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {


        $destination = Destination::find( $id );
        $img         = $destination->img;
        $img_path    = 'public/uploads/destination/' . $img;

        unlink( base_path( $img_path ) );
        $destination->delete();
        Toastr::success( 'successfully delete destination' );
        return redirect()->route( 'destination.index' );
    }

    public function img_upload( $request, $item_id ) {

        $client_data = Destination::findorFail( $item_id );

        //   dd($client_data);

        if ( $request->hasFile( 'country_img' ) ) {

            if ( $client_data->img != 'default-client.jpg' ) {

                $imgLoadPath = 'public/uploads/destination/';
                $old_path    = $imgLoadPath . $client_data->img;

                $old_path_full = base_path( $old_path );

                if ( file_exists( $old_path_full ) ) {
                    if ( is_file( $old_path_full ) ) {
                        // If it's a file, delete it
                        unlink( realpath( $old_path_full ) );
                    }
                }

            }

            $photo_path     = 'public/uploads/destination/';
            $upload_path    = $request->file( 'country_img' );
            $img_name       = $client_data->id . '.' . $upload_path->getClientOriginalExtension();
            $new_photo_path = $photo_path . $img_name;

            Image::make( $upload_path )->resize( 600, 400 )->save( base_path( $new_photo_path ), 40 ); //40 mean jpg exten convert

            $check = $client_data->update( [

                'img' => $img_name,

            ] );

        }

    }
}
