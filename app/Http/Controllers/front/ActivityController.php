<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activities\Activity;
use App\Destination\Country;
use App\Packages\Package;
use App\Packages\Difficulty;
use App\Destination\Region;


class ActivityController extends Controller
{
  private $all_regions = array();

  function __construct(Activity $activity, Package $package, Region $region,Difficulty $difficulty){
    $this->activity = $activity;
    $this->package = $package;
    $this->region = $region;
    $this->difficulty = $difficulty;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'activities' => $this->activity->where('status','!=', 'draft')->get()
        ];
        return view('frontend.activities')->with($data);
    }


    public function showActivity($slug){
      $activity = $this->activity->where('slug', $slug)->first();
      $all_regions = $this->region->whereIn('id', $this->get_all_regions($activity))->get();
      $packages = $this->package->where('activity_id', $activity->id)->get();
      $difficulty = $this->difficulty->all();
      $data = [
        'activity' => $activity,
        'packages' => $packages,
        'regions' => $all_regions,
        'difficulty' => $difficulty
      ];
      return view('frontend.activity')->with($data);
    }
    //
    public static function get_regions_activity($activity_id, $region_id){
      $whereClause = [
        ['activity_id', '=', $activity_id],
        ['region_id', '=', $region_id]
      ];
      $packages = DB::table('package')->where($whereClause)->get();
      return $packages;
    }

    public function get_all_regions($activity){
      $packages = $activity->packages;
      foreach($packages as $p){
        if(!in_array($p->region->id, $this->all_regions)){
          $this->all_regions[] = $p->region->id;
        }
      }
      return $this->all_regions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage_old.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
