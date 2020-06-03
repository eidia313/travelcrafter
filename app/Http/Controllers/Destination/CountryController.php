<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destination\Country;

class CountryController extends Controller
{

    protected $status = ['published' => 'Published', 'draft' => 'Draft'];

    //Creating/Assining a model
    public function __construct(Country $country){
      $this->country = $country;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->middleware('auth');01

        $countries = $this->country->orderBy('id', 'desc')->get();
        return view('backend.destination.country.index')->with(compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
          $status = $this->status;
          return view('backend.destination.country.create')->with(compact('status'));
        }catch(\Exception $e){
            dd($e);
        }
    }

    /**
     * Store a newly created resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$cover_image;

        $this->validate($request, [
           'name' => 'required|unique:country'
        ]);
        $file = image_upload('cover_image', $request);

       $this->country->create([
         'name' => $request['name'],
         'status' => $request['status'],
         'slug' => str_slug($request['name'], '-'),
           'latitude' =>$request['latitude'],
           'longitude' =>$request['longitude'],
         'cover_image' => $file
       ]);

       return redirect()->route('country.index')->with('success', 'Country Successfully Created!');
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
        $country = $this->country->find($id);
        $status = $this->status;
        return view('backend.destination.country.edit')->with(compact('country', 'status'));
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
        //
        $country = $this->country->find($id);
        $country->name = $request['name'];
        $country->status = $request['status'];
        $country->slug = str_slug($request['name'], '-');

        $country->latitude = $request->latitude;
        $country->longitude = $request->longitude;
        // dd(image_upload('cover_image', $request));
        if(!empty($request['cover_image']))
          $country->cover_image = image_upload('cover_image', $request);
        $country->save();

        return redirect()->route('country.index')->with('success', 'Country Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage_old.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
        $country = $this->country->find($id);
        // Place::where('country_id', $country->id)->update(['country_id' => null]);
        $country->delete();
        return redirect()->route('country.index')->with('success', 'Country Successfully Deleted!');
      }catch(\Exception $e){
        return redirect()->route('country.index')->with('error', 'Cannot Delete Country. It must be associated with Region or City!');
      }
    }
}
