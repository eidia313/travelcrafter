<?php

namespace App\Http\Controllers\Welfare;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Welfare\Welfare;


class WelfareController extends Controller
{

  public function __construct(Welfare $welfare){
    $this->welfare = $welfare;
  }

  public function index()
  {
      //
      $welfares = $this->welfare->orderBy('id', 'desc')->get();
      return view('backend.welfares.welfare.index')->with(compact('welfares'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.welfares.welfare.create');
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
           'title' => 'required|unique:social_welfare',
           'image' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
        ]);

        //Handle File Upload
        $file = image_upload('image', $request);
        
        $this->welfare->create([
          'title' => $request['title'],
          'altitude' => $request['altitude'],
          'date' => $request['date'],
          'sponsor' => $request['sponsor'],
          'desc' => $request['desc'],
          'image' => $file
        ]);

        return redirect()->route('welfare.index')->with('success', 'Welfare Successfully Created!');
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
      $welfare = $this->welfare->find($id);
      return view('backend.welfares.welfare.edit')->with(compact('welfare'));
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
        $welfare = $this->welfare->find($id);
        $welfare->title = $request['title'];
        $welfare->altitude = $request['altitude'];
        $welfare->date = $request['date'];
        $welfare->sponsor = $request['sponsor'];
        $welfare->desc = $request['desc'];
        if(!empty($request['image']))
          $welfare->image = image_upload('image', $request);
        $welfare->save();
        return redirect()->route('welfare.index')->with('success', 'Welfare Successfully Updated!');
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
      $welfare = $this->welfare->find($id);
      //Delete File using Laravel Storage.
      Storage::disk('public')->delete('images/'.$welfare->image);
      $welfare->delete();

      return redirect()->route('welfare.index')->with('success', 'Welfare Successfully Deleted!');
    }
}
