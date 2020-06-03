<?php

namespace App\Http\Controllers\Packages;

use App\Checklists\CheckListGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packages\Package;
use App\Packages\Difficulty;
use App\Destination\Region;
use App\Destination\Country;
use App\Activities\Activity;
use Storage;
class PackageController extends Controller
{

    protected $status = ['published' => 'Published', 'draft' => 'Draft', 'featured' => 'Featured'];

    public function __construct(Package $package, Difficulty $difficulty, Region $region, Country $country, Activity $activity){
      $this->package = $package;
      $this->difficulty = $difficulty;
      $this->region = $region;
      $this->country = $country;
      $this->activity = $activity;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $packages = $this->package->orderBy('id', 'desc')->get();
      return view('backend.packages.package.index')->with(compact('packages'));
    }

    //Read Items for VUE
    // public function readItems(){
    //   $data = $this->package->get();
    //   return $data;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $status = $this->status;
      $difficulties = $this->difficulty->get()->pluck('name', 'id');
      $difficulty = $difficulties->all();

      $regions = $this->region->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $region = $regions->all();

      $countries = $this->country->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $country = $countries->all();

      $activities = $this->activity->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $activity = $activities->all();

      $checklistGroups = CheckListGroup::get()->pluck('name', 'id');
      $checkListGroup = $checklistGroups->all();

      if(empty($difficulty) || empty($region) || empty($country) || empty($activity))
        return redirect()->route('package.index')->with(compact('$difficulties'), 'error', 'Please create Country/Region/Activity First!');
      // print_r($country);
      return view('backend.packages.package.create')->with(compact('status', 'difficulty', 'region', 'country', 'activity','checkListGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

       // dd($request->isBestSelling);

       $this->validate($request, [
          'title' => 'required|unique:package',
          'cover_image' => 'required|image|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100',
          'itenerary' => 'required'
       ]);
       try{
         //Handle File Upload
          $file = image_upload('cover_image', $request);

         $package = new Package();
         $itinerary = itinerary($request);
         $package->title = $request->title;
         $package->description = $request->description;
         $package->altitude = $request->altitude;
         $package->best_season = $request->best_season;
         $package->accomodation = $request->accomodation;
         $package->country_id = $request->country_id;
         $package->region_id = $request->region_id;
         $package->activity_id = $request->activity_id;
         $package->difficulty_id = $request->difficulty_id;
         $package->checklist_group_id = $request->checklist_group_id;
         $package->trip_highlights = $request->trip_highlights;
         $package->duration = count($itinerary);
         $package->cover_image = $file;
         $package->itenerary = encodeJsonObjectAsArray($itinerary);
         $package->slug = str_slug($request->title, '-');
         if($request->isBestSelling != null){
           $package->isBestSelling = 1;
         }else{
           $package->isBestSelling = 0;
         }
         $package->save();
         return redirect()->route('package.index')->with('success', 'Package Successfully Created!');
       }catch(\Exception $e){
         return redirect()->back()->with('error', 'Errors in field!');
       }
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $package = $this->package->find($id);
      $status = $this->status;
      $difficulties = $this->difficulty->get()->pluck('name', 'id');
      $difficulty = $difficulties->all();

      $regions = $this->region->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $region = $regions->all();
      $countries = $this->country->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $country = $countries->all();
      $activities = $this->activity->where('status', '!=', 'draft')->get()->pluck('name', 'id');
      $activity = $activities->all();

      $checklistGroups = CheckListGroup::get()->pluck('name', 'id');
      $checkListGroup = $checklistGroups->all();

      return view('backend.packages.package.edit')->with(compact('status', 'difficulty', 'package', 'region', 'country', 'activity','checkListGroup'));
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

     $iti_data = itinerary($request);
     $package = $this->package->find($id);
     $package->title = $request->title;
     $package->description = $request->description;
     $package->altitude = $request->altitude;
     $package->best_season = $request->best_season;
     $package->accomodation = $request->accomodation;
     $package->country_id = $request->country_id;
     $package->region_id = $request->region_id;
     $package->activity_id = $request->activity_id;
     $package->difficulty_id = $request->difficulty_id;
     $package->checklist_group_id = $request->checklist_group_id;
     $package->trip_highlights = $request->trip_highlights;
     if(!empty($request['cover_image']))
       $package->cover_image = image_upload('cover_image', $request);

     $package->duration = count($iti_data);
     $package->itenerary = encodeJsonObjectAsArray($iti_data);

     $package->slug = str_slug($request->title, '-');
     if($request->isBestSelling != null){
       $package->isBestSelling = 1;
     }else{
       $package->isBestSelling = 0;
     }
     $package->save();

     return redirect()->route('package.index')->with('success', 'Package Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $package = $this->package->find($id);
      $package->delete();

      return redirect()->route('package.index')->with('success', 'Package Successfully Deleted!');
    }
}
