<?php

namespace App\Http\Controllers\Destination;

use App\Destination\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination\Country;
use App\Destination\City;

class CityController extends Controller
{


    protected $status = ['published' => 'Published', 'draft' => 'Draft'];

    public function __construct(Country $country, City $city){
      $this->country = $country;
      $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = $this->city->orderBy('id', 'desc')->get();
        return view('backend.destination.city.index')->with(compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $status = $this->status;
      $countries = $this->country->get()->pluck('name', 'id');
      $country = $countries->all();
      if(empty($country))
        return redirect()->route('country.index')->with(compact('countries'), 'error', 'Please create a Country First!');

      return view('backend.destination.city.create')->with(compact('status', 'country'));
    }

    /**
     * Store a newly created resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:region',
      ]);

     $this->city->create([
       'name' => $request['name'],
       'country_id' => $request['country_id'],
       'status' => $request['status'],
       'slug' => str_slug($request['name'], '-')
     ]);

     return redirect()->route('city.index')->with('success', 'City Successfully Created!');
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
      $city = $this->city->find($id);
      $status = $this->status;
      $countries = $this->country->get()->pluck('name', 'id');
      $country = $countries->all();
      return view('backend.destination.city.edit')->with(compact('country', 'status', 'city'));
    }

    /**
     * Update the specified resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try{
        $city = $this->city->find($id);
        $city->name = $request['name'];
        $city->country_id = $request['country_id'];
        $city->status = $request['status'];
        $city->slug = str_slug($request['name'], '-');
        $city->save();
        return redirect()->route('city.index')->with('success', 'City Successfully Updated!');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Errors in field!');
      }
    }

    /**
     * Remove the specified resource from storage_old.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = $this->city->find($id);

      Place::where('city_id',$city->id)->update(['city_id' => null]);

      $city->delete();

      return redirect()->route('city.index')->with('success', 'City Successfully Deleted!');
    }
}
