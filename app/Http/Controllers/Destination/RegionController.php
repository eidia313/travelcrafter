<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination\Country;
use App\Destination\Region;

class RegionController extends Controller
{

    protected $status = ['published' => 'Published', 'draft' => 'Draft'];

    public function __construct(Country $country, Region $region){
      $this->country = $country;
      $this->region = $region;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = $this->region->orderBy('id', 'desc')->get();
        return view('backend.destination.region.index')->with(compact('regions'));
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
        return view('country.index')->with(compact('countries'), 'error', 'Please create a Country First!');

      return view('backend.destination.region.create')->with(compact('status', 'country'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
         'name' => 'required|unique:region',
         'latitude' => 'required|numeric',
         'longitude' => 'required|numeric'
      ]);

     $this->region->create([
       'name' => $request['name'],
       'country_id' => $request['country_id'],
       'status' => $request['status'],
       'latitude' => $request['latitude'],
       'longitude' => $request['longitude'],
       'slug' => str_slug($request['name'], '-')
     ]);

     return redirect()->route('region.index')->with('success', 'Region Successfully Created!');
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
        $region = $this->region->find($id);
        $status = $this->status;
        $countries = $this->country->get()->pluck('name', 'id');
        $country = $countries->all();
        return view('backend.destination.region.edit')->with(compact('country', 'status', 'region'));

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
        try{
          $region = $this->region->find($id);
          $region->name = $request['name'];
          $region->country_id = $request['country_id'];
          $region->status = $request['status'];
          $region->latitude = $request['latitude'];
          $region->longitude = $request['longitude'];
          $region->slug = str_slug($request['name'], '-');
          $region->save();
          return redirect()->route('region.index')->with('success', 'Region Successfully Updated!');
        }catch(\Exception $e){
          return redirect()->back()->with('error', 'Errors in field!');
        }
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
        $region = $this->region->find($id);
        $region->delete();

        return redirect()->route('region.index')->with('success', 'Region Successfully Deleted!');
    }
}
