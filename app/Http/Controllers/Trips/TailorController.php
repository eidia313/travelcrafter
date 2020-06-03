<?php

namespace App\Http\Controllers\Trips;

use App\Tailor\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TailorController extends Controller
{
    //
    public function getAllTrips(){

        $trips = Trip::latest()->get();

        return view('backend.trips.index',compact('trips'));
    }

    public function getTripDetail($id){

        $trip = Trip::findOrFail($id);

        return view('backend.trips.single',compact('trip'));
    }

    public function deleteTrip($id){

        $trip = Trip::findOrFail($id);

        $trip->delete();

        return redirect()->route('admin.trips');
    }
}
