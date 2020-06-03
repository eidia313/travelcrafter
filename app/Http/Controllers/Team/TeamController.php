<?php

namespace App\Http\Controllers\Team;
use Illuminate\Support\Facades\Storage;
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
        $teams = $this->team->orderBy('id', 'desc')->get();

        return view('backend.teams.team.index')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teams.team.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
         'name' => 'required|unique:team',
         'image' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
      ]);

      $file = image_upload('image', $request);
      $teams = new Team();
      $teams->name = $request->name;
      $teams->designation = $request->designation;
      $teams->image = $file;

      $teams->save();
      return redirect()->route('team.index')->with('success', 'Team Member Successfully Added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $team = $this->team->find($id);
      return view('backend.teams.team.edit')->with(compact('team'));
    }

    public function update(Request $request, $id)
    {
      try{
        $team = $this->team->find($id);
        $team->name = $request['name'];
        if(!empty($request['image']))
          $team->image = image_upload('image', $request);
        $team->designation = $request['designation'];

        $team->save();
        return redirect()->route('team.index')->with('success', 'Team Successfully Updated!');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Errors in field!');
      }
    }

    public function destroy($id)
    {
      $team = $this->team->find($id);
      //Delete File using Laravel Storage.
      Storage::disk('public')->delete('images/'.$team->image);
      $team->delete();

      return redirect()->route('team.index')->with('success', 'Team Member Successfully Removed!');
    }
}
