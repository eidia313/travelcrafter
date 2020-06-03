<?php

namespace App\Http\Controllers\Destination;

use App\Destination\Country;
use App\Places\PlaceType;
use App\Destination\Place;
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
    public function index()
    {
        //
        $places = Place::with(['country','city'])->latest()->paginate(12);

        return view('backend.destination.places.index',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::with('cities')->get();
        $placetype = PlaceType::where('status','!=', 'draft' )->get();

        return view('backend.destination.places.create',compact(['countries', 'placetype']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name' => 'required|max:191|unique:places,name',
            'city_id' => 'required',
            'image' => 'sometimes|nullable|image',
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
        $place->place_type_id = $request->place_type_id;
        $place->country_id = $countryId;
        $place->altitude = $request->altitude;
        $place->description = $request->description;

        if (!empty($request['image'])){
            $place->image = image_upload('image', $request);
        }

        $place->save();

        Session::flash('success', 'New Activity Was Added!');
        return redirect()->route('leisure.index');


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
    public function edit($id)
    {
        //
        $place = Place::findOrFail($id);

        $countries = Country::with('cities')->get();
        $placetype = PlaceType::where('status','!=', 'draft' )->get();
        return view('backend.destination.places.edit',compact('place','countries', 'placetype'));
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
            'name' => 'required|max:191|unique:places,name,'.$id,
            'city_id' => 'required',
            'image' => 'sometimes|nullable|image',
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
        $place->altitude = $request->altitude;
        $place->place_type_id = $request->place_type_id;
        $place->description = $request->description;

        if (!empty($request['image'])){

            $imageToBeDeleted=$place->image;

            $place->image = image_upload('image', $request);

            //delete Image too
            Storage::disk('public')->delete('images/'.$imageToBeDeleted);
        }

        $place->save();

        Session::flash('success', 'Activity Was Updated!');
        return redirect()->route('leisure.edit',$place->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $place = Place::findOrFail($id);

        $imageToBeDeleted=$place->image;

        $place->delete();

        //delete Image too
        Storage::disk('public')->delete('images/'.$imageToBeDeleted);

        Session::flash('success', 'Activity Was Deleted!');
        return redirect()->route('leisure.index');
    }
}
