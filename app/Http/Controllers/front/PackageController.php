<?php

namespace App\Http\Controllers\front;

use App\Checklists\CheckListGroup;
use App\Checklists\CheckListCategory;
use App\Packages\PackageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packages\Package;

class PackageController extends Controller
{

    function __construct(Package $package){
      $this->package = $package;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

    }

    public function showPackage($slug){

      $package = Package::where('slug', $slug)->firstOrFail();

      $itinerary = decodeJsonObjectAsArray($package->itenerary);

      $packageGallery = PackageGallery::where('package_id',$package->id)->get();

      $relatedPackages = Package::where('region_id',$package->region_id)->whereNotIn('slug', [$slug])->limit(3)->get();
      $categories = CheckListCategory::latest()->get(['name']);
      $checkListGroup = CheckListGroup::where('id', $package->checklist_group_id)->firstOrFail();
      $equipments = decodeJsonObjectAsArray($checkListGroup->equipments);

      $data = [
        'package' => $package,
        'itinerary' => $itinerary,
          'packageGallery' => $packageGallery,
          'relatedPackages' => $relatedPackages,
          'checkListGroup' => $equipments,
          'checkListCat' => $categories
      ];
      return view('frontend.packagedetail')->with($data);
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
