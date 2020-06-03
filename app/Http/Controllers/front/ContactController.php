<?php

namespace App\Http\Controllers\front;

use App\Inquiries\Contact;
use App\Setting\Setting;
use App\Contact\Partners;
use App\Contact\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Mail;

class ContactController extends Controller
{

    //Show contact Page
    public function index(){
        $countries = Country::get();
        $partners = Partners::get();
        $data = [
            'partners' => $partners,
            'countries' => $countries
        ];
        return view('frontend.inquiries.contact')->with($data);
    }

    //Store contact form information
    public function store(Request $request){
        $rules = [
            'name'             =>  'required|max:255',
            'email'             =>  'required|max:255',
            'subject'             =>  'required|max:255'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if($validator->fails()){
            return redirect()->route('site.contact')->withErrors($validator)->withInput();
        }

        $setting = Setting::find(1);

        // $mail = Mail::send('frontend.email.contact', $requestData, function ($message) use ($requestData, $setting){
        //     $message->from($requestData['email']);
        //     $message->to($setting->email);
        //     $message->subject('Contact Form Request');
        // });

        $contact = Contact::create($requestData);

        if($contact){
            return redirect()->route('site.contact')->with('message', "Thank You for your enquiry, we'll get in touch with you soon!!");
        }else{
            return redirect()->route('site.contact')->withInput();
        }
    }
}
