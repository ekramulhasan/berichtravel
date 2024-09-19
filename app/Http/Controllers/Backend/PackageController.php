<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\ProductImage;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PackageController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view( 'backend.package.index' );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store( Request $request ) {
        $request->validate( [

            'selling_price' => 'required',
            'regular_price' => 'required',
            'title'         => 'required|string|max:255',
            'location'      => 'required|string|max:100',
            'time'          => 'required',
            'person'        => 'required',
            'room'          => 'required',
            'description'   => 'required|string|max:10000',

        ] );

        $title = $request->title;
        $slug  = Str::lower( str_replace( ' ', '-', $title ) ) . '-' . random_int( 100000, 90000000 );
        // $image     = $request->image;
        // $extension = $image->extension();
        // $file_name = $title . '.' . $extension;
        // Image::make( $image )->resize( 1200, 1200 )->save( public_path( 'upload/package/' . $file_name ) );

        $products = Package::create( [
            'selling_price' => $request->selling_price,
            'regular_price' => $request->regular_price,
            'title'         => $title,
            'location'      => $request->location,
            'time'          => $request->time,
            'person'        => $request->person,
            'room'          => $request->room,
            'description'   => $request->description,
            'slug'          => $slug,
            'created_at'    => Carbon::now(),
        ] );

        // dd($products->id);

        $this->img_upload( $request, $products->id );
        $this->multiple_img_upload( $request, $products->id );

        Toastr::success( 'successfully added new product' );
        return back()->with( 'package', 'Package Create Successfuly' );
    }

    /**
     * Display the specified resource.
     */
    public function show() {
        $packages = Package::all();
        return view( 'backend.package.all_package', compact( 'packages' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::findOrFail($id);
        return view('backend.package.edit_package', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'selling_price' => 'required',
            'regular_price' => 'required',
            'title'         => 'required|string|max:255',
            'location'      => 'required|string|max:100',
            'time'          => 'required',
            'person'        => 'required',
            'room'          => 'required',
            'description'   => 'required|string|max:10000',
        ]);

        $package = Package::findOrFail($id);

        $package->update([
            'selling_price' => $request->selling_price,
            'regular_price' => $request->regular_price,
            'title'         => $request->title,
            'location'      => $request->location,
            'time'          => $request->time,
            'person'        => $request->person,
            'room'          => $request->room,
            'description'   => $request->description,
        ]);

        if ($request->hasFile('product_img')) {
            $this->img_upload($request, $id);
        }

        if ($request->hasFile('product_multiple_img')) {
            $this->multiple_img_upload($request, $id);
        }

        Toastr::success('Package updated successfully');
        return redirect()->route('all.package')->with('package_update', 'Package Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {

        $package         = Package::find( $id );
        $multiple_images = ProductImage::where( 'product_id', $id )->select( ['id', 'product_multiple_img_name'] )->get();
        $delete_from     = public_path( '/upload/package/' . $package->image );

        foreach ( $multiple_images as $key => $value ) {

            $img_name   = $value->product_multiple_img_name;
            $delete_img = public_path( '/upload/package/' . $img_name );
            unlink( $delete_img );

            ProductImage::find( $value->id )->delete();

        }

        unlink( $delete_from );
        Package::find( $id )->delete();
        return back()->with( 'package_delete', ' Delete Successfuly' );
    }

    public function img_upload( $request, $item_id ) {

        $product_data = Package::findorFail( $item_id );

        // dd($product_data);

        if ( $request->hasFile( 'product_img' ) ) {

            //   if ($product_data->product_img != 'default-client.jpg') {

            //       $imgLoadPath = 'public/assets/uploads/products/';
            //       $old_path = $imgLoadPath.$product_data->product_img;

            //       unlink(base_path($old_path));
            //   }

            $photo_path     = 'public/upload/package/';
            $upload_path    = $request->file( 'product_img' );
            $img_name       = $product_data->id . '.' . $upload_path->getClientOriginalExtension();
            $new_photo_path = $photo_path . $img_name;

            // $manager = new ImageManager( new Driver() );
            // $image   = $manager->read( $upload_path );
            // $image->scale( width: 1200 );
            // $image->toJpeg( 80 )->save( base_path( $new_photo_path ) );

            Image::make( $upload_path )->resize( 1200, 1200 )->save( base_path( $new_photo_path ), 40 ); //40 mean jpg exten convert


            $check = $product_data->update( [

                'image' => $img_name,

            ] );

        }



    }


    public function multiple_img_upload( $request, $product_id ) {

        if ( $request->hasFile( 'multiple_product_img' ) ) {

            $multiple_images = ProductImage::where( 'product_id', $product_id )->get();

            foreach ( $multiple_images as $value ) {

                if ( $multiple_images->product_multiple_img_name != 'default-img.jpg' ) {

                    $file_location = 'public/upload/package/';
                    $old_img       = $file_location . $value->product_multiple_img_name;

                    unlink( base_path( $old_img ) );

                }

                // delete old value from table
                $multiple_images->delete();
            }

            // assign a flag variable
            $flag = 1;

            foreach ( $request->file( 'multiple_product_img' ) as $value ) {

                $file_location     = 'public/upload/package/';
                $new_img_name      = $product_id . '-' . $flag . '.' . $value->getClientOriginalExtension();
                $new_file_loaction = $file_location . $new_img_name;

                // $manager = new ImageManager( new Driver() );
                // $image   = $manager->read( $value );
                // $image->scale( width: 600 );
                // $image->toJpeg( 80 )->save( base_path( $new_file_loaction ) );

                Image::make( $value )->resize( 1200, 1200 )->save( base_path( $new_file_loaction ), 40 );

                ProductImage::create( [

                    'product_id'                => $product_id,
                    'product_multiple_img_name' => $new_img_name,

                ] );

                $flag++;

            }

        }

    }
}
