<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\GuideController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OurServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get( '/clear-cache', function () {
    $exitCode = Artisan::call( 'cache:clear' );
    return '<h1>Cache facade value cleared</h1>';
} );

//Reoptimized class loader:
Route::get( '/optimize', function () {
    $exitCode = Artisan::call( 'optimize' );
    return '<h1>Reoptimized class loader</h1>';
} );

//Route cache:
Route::get( '/route-cache', function () {
    $exitCode = Artisan::call( 'route:cache' );
    return '<h1>Routes cached</h1>';
} );

//Clear Route cache:
Route::get( '/route-clear', function () {
    $exitCode = Artisan::call( 'route:clear' );
    return '<h1>Route cache cleared</h1>';
} );

//Clear View cache:
Route::get( '/view-clear', function () {
    $exitCode = Artisan::call( 'view:clear' );
    return '<h1>View cache cleared</h1>';
} );

Route::get( '/', [FrontendController::class, 'index'] )->name( 'home' );
Route::get( '/about/us/', [FrontendController::class, 'aboutUs'] )->name( 'about.page' );
Route::get( '/all/packages/', [FrontendController::class, 'allPackages'] )->name( 'all_packagesss' );
Route::get( '/contact/us/', [FrontendController::class, 'contactUs'] )->name( 'contact' );

Route::get( '/package/details/{slug}', [FrontendController::class, 'packageDetails'] )->name( 'package.deteals' );
Route::get( '/package/booking/{slug}', [BookingController::class, 'indexBooking'] )->name( 'booking.now' );
Route::post( '/package/booking', [BookingController::class, 'store'] )->name( 'booking.store' );

Route::prefix( 'admin/' )->group( function () {

    Route::middleware( 'auth' )->group( function () {

        Route::get( '/dashboard', function () {
            return view( 'backend.dashboard' );
        } )->name( 'dashboard' );

        Route::get( '/profile', [ProfileController::class, 'edit'] )->name( 'profile.edit' );
        Route::patch( '/profile', [ProfileController::class, 'update'] )->name( 'profile.update' );
        Route::delete( '/profile', [ProfileController::class, 'destroy'] )->name( 'profile.destroy' );

        Route::get( '/user/info/edite', [AdminController::class, 'edite'] )->name( 'edite_user' );
        Route::post( '/user/info/update', [AdminController::class, 'update_user'] )->name( 'user_update' );
        Route::post( '/user/password/update', [AdminController::class, 'changes_pass'] )->name( 'changes_pass' );
        Route::post( '/user/profile-photo/update', [AdminController::class, 'profile_photo'] )->name( 'profile_photo_update' );
        Route::get( '/logout', [AdminController::class, 'admin_logout'] )->name( 'admin.logout' );

        //package
        Route::get( '/create/new/package', [PackageController::class, 'index'] )->name( 'create.package' );
        Route::post( '/store/new/package', [PackageController::class, 'store'] )->name( 'package.store' );
        Route::get( '/all/package', [PackageController::class, 'show'] )->name( 'all.package' );
        Route::get( '/delete/package/{id}', [PackageController::class, 'destroy'] )->name( 'detele_package' );
        Route::get( '/edit/package/{id}', [PackageController::class, 'edit'] )->name( 'edit.package' );
        Route::post( '/update/package/{id}', [PackageController::class, 'update'] )->name( 'update.package' );

        //guide
        Route::get( '/create/guide', [GuideController::class, 'index'] )->name( 'create.guide' );
        Route::post( '/store/guide', [GuideController::class, 'store'] )->name( 'store.guide' );
        Route::get( '/delete/guide/{id}', [GuideController::class, 'destroy'] )->name( 'detele_guide' );

        //booking
        Route::get( '/all/booking', [BookingController::class, 'allBooking'] )->name( 'all.booking' );
        Route::get( '/booking/details/{id}', [BookingController::class, 'BookingDetails'] )->name( 'booking.details' );
        Route::get( '/booking/prosesing/{id}', [BookingController::class, 'BookingProsesing'] )->name( 'prosesing_booking' );
        Route::get( '/booking/complate/{id}', [BookingController::class, 'BookingComplate'] )->name( 'compleate_booking' );

        Route::get( '/all/deposit', [DepositController::class, 'allDeposit'] )->name( 'deposit.requst' );
        Route::get( '/add/deposit/{id}', [DepositController::class, 'addDepositBalance'] )->name( 'add.deposit.balance' );

        // About Us
        Route::get( '/about', [FrontendController::class, 'editAbout'] )->name( 'edit.about' );
        Route::Post( '/update', [FrontendController::class, 'updateAbout'] )->name( 'update.about' );

        // our service
        Route::resource( '/our-service', OurServiceController::class );
        // our facility
        Route::resource( '/our-facility', FacilityController::class );
        // testimonial
        Route::resource( '/testimonial', TestimonialController::class );
        // destination
        Route::resource( '/destination', DestinationController::class );

    } );

    //Setting Management
    Route::group( ['as' => 'settings.', 'prefix' => 'settings'], function () {

        //general setting
        Route::get( 'general', [SettingController::class, 'general'] )->name( 'general' );
        Route::post( 'general_update', [SettingController::class, 'general_update'] )->name( 'general.update' );

        //apperance setting
        Route::get( 'apperance', [SettingController::class, 'apperance'] )->name( 'apperance' );
        Route::post( 'apperance_update', [SettingController::class, 'apperance_update'] )->name( 'apperance.update' );

        //mail setting
        Route::get( 'mail', [SettingController::class, 'mail'] )->name( 'mail' );
        Route::post( 'mail_update', [SettingController::class, 'mail_update'] )->name( 'mail.update' );

        //social login setting
        Route::get( 'socialite', [SettingController::class, 'socialiteView'] )->name( 'socialite' );
        Route::post( 'socialite_update', [SettingController::class, 'socialiteUpdate'] )->name( 'socialite.update' );

    } );

} );

require __DIR__ . '/auth.php';

//user login
Route::get( '/customer/login', [CustomerAuthController::class, 'index'] )->name( 'customer.login' );
Route::get( '/customer/registration', [CustomerAuthController::class, 'customerRegister'] )->name( 'customer.register' );
Route::post( '/customer/registrations', [CustomerAuthController::class, 'store'] )->name( 'customer.registration' );
Route::post( '/customer/logins', [CustomerAuthController::class, 'customerLogin'] )->name( 'customer.login_post' );
Route::get( '/customer/logout', [CustomerAuthController::class, 'customerLogout'] )->name( 'customer.logout' );

Route::get( '/customer/profile', [CustomerAuthController::class, 'customerProfile'] )->name( 'customer.profile' );
Route::get( '/customer/profile/settings', [CustomerAuthController::class, 'settings'] )->name( 'customer.profile.settings' );
Route::post( '/customer/profile/update', [CustomerAuthController::class, 'customerProfileUpdate'] )->name( 'upadete.customer.profile.info' );
Route::post( '/customer/photo/update', [CustomerAuthController::class, 'customerPhotoUpdate'] )->name( 'upadete.customer.photo' );
Route::get( '/customer/deposit', [DepositController::class, 'index'] )->name( 'customer.deposit' );
Route::post( '/submit/deposit', [DepositController::class, 'store'] )->name( 'submit.deposit' );
