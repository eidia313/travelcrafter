<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-config', function () {
    $exitCode = Artisan::call('config:clear');
    return "config clear";
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return "Cache cleared!";
});

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    return "Database Migrated";
});


Route::namespace('front')->group(function () {
    Route::get('/', 'HomeController@show');
    Route::get('package/{slug}', 'PackageController@showPackage')->name('fe.singlePackage');
    Route::get('place/{slug}', 'PackageController@showPackage')->name('fe.singlePackage');
    Route::get('activity', 'ActivityController@index')->name('site.activity');
    Route::get('activity/{slug}', 'ActivityController@showActivity');

    /* Route::post('booking/{slug?}', 'BookingController@showBookingByDate')->name('site.booking_date');
    Route::get('booking/{slug?}', 'BookingController@index')->name('site.booking');
    Route::post('booking/{slug?}', 'BookingController@store')->name('site.booking.store'); */

    Route::resources([
        'packagebooking' => 'BookingController',
    ]);

    // Route::get('booking/{slug}', 'BookingController@index')->name('site.booking');
    // Route::post('booking/{slug}', 'BookingController@showBookingByDate')->name('site.booking-date');
    // Route::post('booking', 'BookingController@store')->name('site.booking.store');

    //Contact Inquiries
    Route::get('contact', 'ContactController@index')->name('site.contact');
    Route::post('contact', 'ContactController@store')->name('site.contact.store');

    //About
    Route::get('about-us', 'AboutController@index')->name('site.about');
    Route::get('faq', 'FaqController@index')->name('site.faq');
    Route::get('teams', 'TeamController@index')->name('site.team');
    Route::get('services', 'ServiceController@index')->name('site.service');

    //Tailor Made Trips
    Route::get('tailor-made-trip/', 'TailorController@showTrip')->name('trip');
    Route::post('tailor-made-trip/', 'TailorController@storeTrip')->name('trip.store');

    //Pages
    Route::get('pages/{slug}', 'PageController@index')->name('site.page');

    //places
    Route::get('{country}/places', 'PlacesController@getCountryPlaces')->name('fe.places');

    Route::get('region/packages/{id}', 'PlacesController@getRegionPackages');
});


//
// Route::get('/about', function () {
//     return view('about');
// })->middleware('auth');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home');
    });

    Route::group(['prefix' => 'destination'], function () {
        Route::resources([
            'country' => 'Destination\CountryController',
            'region' => 'Destination\RegionController',
            'city' => 'Destination\CityController'
        ]);
    });

    Route::group(['prefix' => 'activities', 'namespace'], function () {
        Route::resources([
            'activity' => 'Activity\ActivityController',
            '{activity}/place' => 'Destination\PlacesController',
            '{activity}/placetype' => 'Places\PlaceTypeController',
        ]);

        /* Route::group(['prefix' => 'leisure'], function () {
            Route::resource('place', 'Destination\PlacesController');
            Route::resource('placetype', 'Places\PlaceTypeController');
        }); */
    });

    Route::group(['prefix' => 'welfares'], function () {
        Route::resources([
            'welfare' => 'Welfare\WelfareController',
        ]);
    });

    Route::group(['prefix' => 'services'], function () {
        Route::resources([
            'service' => 'Services\ServiceController',
        ]);
    });

    Route::group(['prefix' => 'checklists'], function () {
        Route::resources([
            'equipments' => 'Checklist\EquipmentController',
            'groups' => 'Checklist\ChecklistGroupController',
            'category' => 'Checklist\CheckListCategoryController',
        ]);
    });

    Route::group(['prefix' => 'partners'], function () {
        Route::resources([
            'ccountry' => 'Contact\CountryController',
            'clist' => 'Contact\ListController',
        ]);
    });

    Route::group(['prefix' => 'teams'], function () {
        Route::resources([
            'team' => 'Team\TeamController',
        ]);
    });


    Route::resources([
        'testimonial' => 'Testimonial\TestimonialController',
    ]);


    Route::group(['prefix' => 'packages'], function () {
        Route::resources([
            'package' => 'Packages\PackageController',
            'difficulty' => 'Packages\DifficultyController',
            'booking' =>  'Packages\BookingController'
        ]);

        //package images
        Route::get('gallery/{id}', 'Packages\PackageGalleryController@getPackageImages')->name('gallery.index');
        Route::post('gallery', 'Packages\PackageGalleryController@storeImages')->name('gallery.store');
        Route::delete('gallery/{id}', 'Packages\PackageGalleryController@deleteImages')->name('gallery.destroy');
        /*Route::get('/', 'Inquiry\InquiryController@getTrips');
    Route::delete('inquiry/{id}', 'Inquiry\InquiryController@deleteTrips');*/
    });



    Route::group(['prefix' => 'inquiries'], function () {
        Route::resource('contact', 'Inquiries\ContactController');
    });

    //Pages
    Route::resource('pages', 'Pages\PageController');
    Route::resource('faq', 'Faq\FaqController');
    Route::resource('partners', 'Partners\PartnerController');

    //Site Settings
    Route::group(['prefix' => 'site'], function () {
        Route::resources([
            'setting' => 'Setting\SettingController',
        ]);
    });

    //tailor trips route
    Route::get('tailor-made-trips', 'Trips\TailorController@getAllTrips')->name('admin.trips');
    Route::get('tailor-made-trips/{id}/details', 'Trips\TailorController@getTripDetail')->name('admin.trip');
    Route::delete('tailor-made-trips/{id}', 'Trips\TailorController@deleteTrip')->name('admin.delete-trip');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');
Route::get('/readpackage', 'Packages\PackageController@readItems')->name('readpackage');
Route::post('/createpackage', 'Packages\PackageController@createPackage')->name('createpackage');
*/