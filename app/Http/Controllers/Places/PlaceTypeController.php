<?php

namespace App\Http\Controllers\Places;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Places\PlaceType;

use Session;

class PlaceTypeController extends Controller
{

    protected $status = ['published' => 'Published', 'draft' => 'Draft'];

    public function __construct(PlaceType $placetype){
      $this->placetype = $placetype;
    }

    public function index()
    {
      $placetype = $this->placetype->orderBy('id', 'desc')->get();
      return view('backend.places.placetype.index')->with(compact('placetype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = $this->status;
        return view('backend.places.placetype.create')->with(compact('status'));
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
        'name' => 'required|unique:placetype',
      ]);

     $this->placetype->create([
       'name' => $request['name'],
       'status' => $request['status']
     ]);

     return redirect()->route('placetype.index')->with('success', 'Place Type Successfully Created!');
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
      $placetype = $this->placetype->find($id);
      $status = $this->status;
      return view('backend.places.placetype.edit')->with(compact('placetype','status'));
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
        $placetype = $this->placetype->find($id);
        $placetype->name = $request['name'];
        $placetype->status = $request['status'];
        $placetype->save();
        return redirect()->route('placetype.index')->with('success', 'Place Type Successfully Updated!');
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
      $placetype = PlaceType::findOrFail($id);
      $placetype->delete();
      Session::flash('success', 'Place type was Deleted!');
      return redirect()->route('placetype.index');
    }
}
