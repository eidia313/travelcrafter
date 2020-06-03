<?php

namespace App\Http\Controllers\front;

use App\Packages\Booking;
use App\Packages\Package;
use App\Setting\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Validator;

class BookingController extends Controller
{
    public function index(Request $request, $slug = null){
      if($slug != null){
        $packages = Package::get();
        $selectedPackage= Package::where('slug',$slug)->first();
        return view('frontend.booking.index', compact('packages','selectedPackage'));
        }else{
          return redirect('404');
        }
        //dd($selectedPackage);
    }

    public function showBookingByDate(Request $request,$slug = null){
        $packages = Package::get();
        $startDate= date('Y-m-d',strtotime($request->startDate));
        $endDate= date('Y-m-d',strtotime($request->endDate));

        $selectedPackage= Package::where('slug',$slug)->first();

        return view('frontend.booking.index', compact('packages','selectedPackage','startDate','endDate'));
    }

    public function show($slug){
      $packages = Package::get();
      $selectedPackage= Package::where('slug',$slug)->first();
      return view('frontend.booking.index', compact('packages','selectedPackage'));
    }

    public function store(Request $request){
        $rules = [
            'package'                =>  'required|max:255',
            'trip_start_date'           =>  'required',
            'people_num'                =>  'required',
            'full_name'                 =>  'required|max:255',
            'dob'                       =>  'required|max:255',
            'country'                   =>  'required',
            'city'                      =>  'required|max:255',
            'email'                     =>  'required|email',
            'emergency_contact_name'    =>  'required|alpha-dash',
            'emergency_phone'           =>  'required|alpha-dash'
        ];
        $requestData = $request->all();

        $validator = Validator::make($requestData, $rules);

        if($validator->fails()){
            return redirect()->route('site.booking')->withErrors($validator)->withInput();
        }
        $booking = Booking::create($requestData);
        $setting = Setting::find(1);
        $mail = Mail::send('frontend.email.booking', $requestData, function ($message) use ($requestData, $setting){
            $message->from($requestData['email']);
            $message->to($setting->email);
            $message->subject('New Order Received');
        });
        if ($booking) {
            return redirect()->back();
            // return redirect()->route('site.booking')->with('flash_message', 'Thanks for booking! We will be in touch with you shortly.');
        } else {
          dd("Booking Failed");
            // return redirect()->route('site.booking')->withInput();
        }
    }
}
