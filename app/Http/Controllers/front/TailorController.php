<?php

namespace App\Http\Controllers\front;

use App\Activities\Activity;
use App\Destination\Country;
use App\Tailor\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TailorController extends Controller
{
    //
    public function getTrip(){

    }

    public function showTrip(){
        $destinations    =  Country::all();
        $activities      =  Activity::select('id','name')->where('showontailor', 1)->get();
        return view('frontend.tailor', compact('destinations', 'activities'));
    }

    public function storeTrip(Request $request){

        $rules = [
            'day'           =>  'required|integer',
            'month'         =>  'required|integer',
            'year'          =>  'required|integer',
            /*
            'adults'        =>  'required|integer',
            'hotel_class'   =>  'required',
            'interest'      =>  'required',
            'title'         =>  'required',
            'full_name'     =>  'required',
            'email'         =>  'required|email',
            'phone'         =>  'required|alpha_dash',
            'nationality'   =>  'required',
            'find_us'       =>  'required'*/
        ];

        //dd($request);

        $requestData = $request->except('_token');

        $validator = Validator::make($requestData, $rules);

        if($validator->fails()){
            return redirect()->route('trip')->withErrors($validator)->withInput();
        }

        $requestData['destination_id'] = $request->destination_id;

        $requestData['date'] =$request->year.'-'.$request->month.'-'.$request->day;

        //dd($request->except('_token'));
        $trip = Trip::create($requestData);

        //$trip->destination()->attach($request->destination);

        $trip->activity()->attach($request->activity);

        if($trip){
            return redirect()->route('trip')->with('success', 'Thank You, your trip information has been submitted successfully!!');
        }else{
            return redirect()->route('trip')->withErrors($validator)->withInput();
        }
    }

    public function deleteTrip($id){
        $trip = Trip::find($id);
    }
}
