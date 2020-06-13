<?php

namespace App\Http\Controllers\Destination;

use App\Activities\Activity;
use App\Activities\ActivityType;
use App\Destination\Country;
use App\Places\PlaceType;
use App\Destination\Place;
use App\Destination\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Storage;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($activity)
    {
        //

        $placesActivity = Activity::where('name', $activity)->first();

        if (!empty($placesActivity)) {
            $places = Place::with(['country', 'city'])->where('activity_id', $placesActivity->id)->latest()->paginate(12);
        } else {
            $places = [];
        }

        return view('backend.destination.places.index', compact('places', 'activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($activity)
    {
        //
        $countries = Country::with('cities')->get();
        $placetype = PlaceType::where('status', '!=', 'draft')->get();

        $placesActivity = Activity::where('name', $activity)->first();

        $regions = Region::where('status', '!=', 'draft')->get();

        return view('backend.destination.places.create', compact(['countries', 'placetype', 'activity', 'regions', 'placesActivity']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->activity);
        //validate
        $this->validate($request, [
            'name' => 'required|max:191|unique:places,name',
            'city_id' => 'required',
            'cover_image' => 'sometimes|nullable|image',
            'altitude' => 'max:191',
        ]);

        //generating the slug
        $slug = str_slug($request->name, '-');

        //get city & country id
        $aId = explode(',', $request->city_id);
        $countryId = $aId[0];
        $cityId = $aId[1];

        $place = new Place();
        $place->name = $request->name;
        $place->slug = $slug;
        $place->city_id = $cityId;
        $place->activity_id = $request->activity_id;
        $place->region_id = $request->region_id;
        $place->place_type_id = $request->place_type_id;
        $place->country_id = $countryId;
        $place->altitude = $request->altitude;
        $place->description = $request->description;

        if (!empty($request['cover_image'])) {
            $place->cover_image = image_upload('cover_image', $request);
        }

        $place->save();

        $activity = Activity::where('id', $request->activity_id)->first();

        Session::flash('success', 'New Activity Was Added!');
        return redirect()->route('place.index', $activity->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($activity, $id)
    {
        //
        $place = Place::findOrFail($id);

        $regions = Region::where('status', '!=', 'draft')->get();

        $countries = Country::with('cities')->get();
        $placetype = PlaceType::where('status', '!=', 'draft')->get();
        $placesActivity = Activity::where('name', $activity)->first();

        return view('backend.destination.places.edit', compact('place', 'countries', 'placetype', 'activity', 'regions', 'placesActivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|max:191|unique:places,name,' . $id,
            'city_id' => 'required',
            'cover_image' => 'sometimes|nullable|image',
            'altitude' => 'max:191',
        ]);

        //generating the slug
        $slug = str_slug($request->name, '-');

        //get city & country id
        $aId = explode(',', $request->city_id);
        $countryId = $aId[0];
        $cityId = $aId[1];

        $place = Place::findOrFail($id);
        $place->name = $request->name;
        $place->slug = $slug;
        $place->city_id = $cityId;
        $place->country_id = $countryId;
        $place->activity_id = $request->activity_id;
        $place->region_id = $request->region_id;
        $place->altitude = $request->altitude;
        $place->place_type_id = $request->place_type_id;
        $place->description = $request->description;

        if (!empty($request['cover_image'])) {

            $cover_imageToBeDeleted = $place->cover_image;

            $place->cover_image = image_upload('cover_image', $request);

            //delete cover_image too
            Storage::disk('public')->delete('images/' . $cover_imageToBeDeleted);
        }

        $place->save();

        Session::flash('success', 'Activity Was Updated!');
        return redirect()->route('leisure.edit', $place->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($activity, $id)
    {
        //
        $place = Place::findOrFail($id);

        $cover_imageToBeDeleted = $place->cover_image;

        $place->delete();

        //delete cover_image too
        Storage::disk('public')->delete('images/' . $cover_imageToBeDeleted);

        Session::flash('success', 'Activity Was Deleted!');
        return redirect()->route('place.index', $activity);
    }
}