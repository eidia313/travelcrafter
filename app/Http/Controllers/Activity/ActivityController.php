<?php

namespace App\Http\Controllers\Activity;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activities\Activity;


class ActivityController extends Controller
{
  protected $status = ['published' => 'Published', 'draft' => 'Draft', 'featured' => 'Featured'];

  public function __construct(Activity $activity){
    $this->activity = $activity;
  }

  public function index()
  {
      //
      $activities = $this->activity->orderBy('id', 'desc')->get();
      return view('backend.activities.activity.index')->with(compact('activities'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->status;
        return view('backend.activities.activity.create')->with(compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:activity',
           'image' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
           'thumb' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
        ]);

        //Handle File Upload
        $file = image_upload('image', $request);
        $thumb = thumb('thumb', $request);
        $showontailor = 0;
        
        if($request['showontailor'] != null){
           $showontailor = 1;
        }

        $this->activity->create([
          'name' => $request['name'],
          'status' => $request['status'],
          'desc' => $request['desc'],
          'image' => $file,
          'thumbnail' => $thumb,
          'showontailor' => $showontailor,
          'slug' => str_slug($request['name'], '-')
        ]);

        return redirect()->route('activity.index')->with('success', 'Avtivity Successfully Created!');
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
      $activity = $this->activity->find($id);
      $status = $this->status;
      return view('backend.activities.activity.edit')->with(compact('status', 'activity'));
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
      try{
        $showontailor = 0;
        
        if($request['showontailor'] != null){
           $showontailor = 1;
        }

        $activity = $this->activity->find($id);
        $activity->name = $request['name'];
        $activity->desc = $request['desc'];
        if(!empty($request['image']))
          $activity->image = image_upload('image', $request);
        if(!empty($request['thumb']))
          $activity->thumbnail = thumb('thumb', $request);
        $activity->showontailor = $showontailor;
        $activity->status = $request['status'];
        $activity->slug = str_slug($request['name'], '-');
        $activity->save();
        return redirect()->route('activity.index')->with('success', 'Activity Successfully Updated!');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Errors in field!');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $activity = $this->activity->find($id);
      //Delete File using Laravel Storage.
      Storage::disk('public')->delete('images/'.$activity->image);
      $activity->delete();

      return redirect()->route('activity.index')->with('success', 'Activity Successfully Deleted!');
    }
}
