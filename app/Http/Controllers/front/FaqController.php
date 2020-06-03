<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq\Faq;
class FaqController extends Controller
{
  public function __construct(Faq $faq){
    $this->faq = $faq;
  }

  public function index()
  {
      $faq = Faq::where('status','!=', 'draft')->get();

      return view('frontend.faq', compact('faq'));
  }
}
