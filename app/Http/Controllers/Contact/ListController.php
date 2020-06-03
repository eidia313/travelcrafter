<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact\Partners;
use App\Contact\Country;

class ListController extends Controller{
	public function __construct(Partners $partners, Country $country){
		$this->partner = $partners;
		$this->country = $country;
	}

	public function index(){
		$partners = $this->partner->orderBy('id', 'desc')->get();
		return view('backend.contact.list.index')->with(compact('partners'));
	}


	//Create Form
	public function create()
    {
    	$countries = $this->country->orderBy('id', 'desc')->get()->pluck('name', 'id');
      $country = $countries->all();
      return view('backend.contact.list.create')->with(compact('country'));
    }

    //Store data from form
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:clist'
        ]);

        $partner = new Partners();
        $partner->name = $request->name;
        $partner->c_id = $request->c_id;
        $partner->email = $request->email;
        $partner->phone = $request->phone;
        $partner->city = $request->city;
        $partner->save();
        return redirect()->route('clist.index')->with('success', 'Partners Successfully Added!');
    }

	public function edit($id){
		$countries = $this->country->orderBy('id', 'desc')->get()->pluck('name', 'id');
        $country = $countries->all();
		$partner = $this->partner->find($id);
	    return view('backend.contact.list.edit')->with(compact('partner', 'country'));
	}

	public function update(Request $request, $id)
    {

     $partner = $this->partner->find($id);
     $partner->name = $request->name;
     $partner->email = $request->email;
     $partner->phone = $request->phone;
     $partner->city = $request->city;
     $partner->c_id = $request->c_id;
     $partner->save();

     return redirect()->route('clist.index')->with('success', 'Partner Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $partner = $this->partner->find($id);
      $partner->delete();

      return redirect()->route('clist.index')->with('success', 'Partner Successfully Removed!');
    }
}
