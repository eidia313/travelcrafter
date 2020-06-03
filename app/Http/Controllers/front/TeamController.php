<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team\Team;


class TeamController extends Controller
{
  public function __construct(Team $team){
    $this->team = $team;
  }

  public function index()
  {
      $teams = Team::latest()->get();
      return view('frontend.team', compact('teams'));
  }
}
