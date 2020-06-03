<?php

namespace App\Http\Controllers\front;

use App\Pages\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //
    public function index($slug){
        $page = Page::where('slug', $slug)->where('status','!=', 'draft')->first();
        return view('frontend.pages.index', compact('page'));
    }
}
