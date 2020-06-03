<?php

namespace App\Http\Controllers\front;

use App\Testimonial\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packages\Package;
use App\Activities\Activity;
use App\Services\Service;

class HomeController extends Controller
{
    function __construct(Package $package, Activity $activity, Service $service){
      $this->package = $package;
      $this->activity = $activity;
      $this->service = $service;
    }

    function show(){
      $service = Service::where('id', 1)->first();
      return view('frontend.home', compact('service'));
    }
}
