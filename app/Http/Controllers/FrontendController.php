<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Destination;
use App\Models\Facility;
use App\Models\Guide;
use App\Models\OusService;
use App\Models\Package;
use App\Models\ProductImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FrontendController extends Controller {
    public function index() {

        $packages      = Package::all();
        $all_guide     = Guide::all();
        $about_section = About::all();
        $our_service   = OusService::all();
        $our_process   = Facility::all();
        $testimonial   = Testimonial::all();
        $destination   = Destination::all();

        return view( 'frontend.home', compact(

            'packages',
            'all_guide',
            'about_section',
            'our_service',
            'our_process',
            'testimonial',
            'destination',

        ) );
    }

    public function packageDetails( $slug ) {

        $details_package = Package::where( 'slug', $slug )->get();
        $package_id      = $details_package->first()->id;
        $package_info    = Package::find( $package_id );
        $multi_img       = ProductImage::where( 'product_id', $package_id )->get();
        return view( 'frontend.package_details', compact( 'package_info','multi_img' ) );

    }

    public function aboutUs() {
        $about_section = About::all();
        $all_guide     = Guide::all();
        return view( 'frontend.about', compact( 'all_guide', 'about_section' ) );
    }

    public function allPackages() {
        $packages = Package::all();
        return view( 'frontend.packages', compact( 'packages' ) );
    }

    public function contactUs() {
        return view( 'frontend.contactus' );
    }

    public function editAbout() {
        $aboutus = About::all();
        return view( 'backend.aboutUs', compact( 'aboutus' ) );
    }

    public function updateAbout( Request $request ) {
        $request->validate( [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ] );
        $id = $request->id;

        if ( About::find( $id )->image != null ) {
            $delete_from = public_path( 'upload/guide/' . About::find( $id )->image );
            unlink( $delete_from );

        }
        $photo     = $request->image;
        $exten     = $photo->extension();
        $file_name = time() . '.' . $exten;
        Image::make( $photo )->resize( 800, 600 )->save( public_path( 'upload/guide/' . $file_name ) );

        About::find( $id )->update( [
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $file_name,
        ] );
        return back()->with( 'about_updated' );
    }
}
