<?php

namespace App\Http\Controllers\front;

use App\Activities\Activity;
use App\Destination\Country;
use App\Destination\Place;
use App\Destination\Region;
use App\Packages\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    //
    public function getCountryPlaces($countrySlug)
    {
        $country = Country::where('slug', $countrySlug)->firstOrFail();

        $countryRegions = Region::where('country_id', $country->id)->get();

        $countryPlaces = Place::where('country_id', $country->id)->latest()->take(3)->get();

        $countryActivities = Activity::latest()->take(7)->get();

        return view('frontend.places.index', compact('country', 'countryRegions', 'countryPlaces', 'countryActivities'));
    }

    //for ajax call only
    public function getRegionPackages(Request $request, $regionId)
    {
        $regionPackages = Package::where('region_id', $regionId)->get();

        if ($request->ajax()) {

            return view('frontend.places.region-packages', compact('regionPackages'))->render();
        }
    }

    public function getActivityPlaces()
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        $itinerary = decodeJsonObjectAsArray($package->itenerary);

        $packageGallery = PackageGallery::where('package_id', $package->id)->get();

        $relatedPackages = Package::where('region_id', $package->region_id)->whereNotIn('slug', [$slug])->limit(3)->get();
        $categories = CheckListCategory::latest()->get(['name']);
        $checkListGroup = CheckListGroup::where('id', $package->checklist_group_id)->firstOrFail();
        $equipments = decodeJsonObjectAsArray($checkListGroup->equipments);

        return view('frontend.places.activity-places')->with('places');
    }
}