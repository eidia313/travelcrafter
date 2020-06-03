<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact\Country;

class CountryController extends Controller
{
    public function __construct(Country $country){
		$this->country = $country;
	}

	public function index(){
		$countries = $this->country->orderBy('id', 'desc')->get();
		return view('backend.contact.country.index')->with(compact('countries'));
	}

	//Create Form
	public function create()
    {
        return view('backend.contact.country.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:ccountry'
        ]);

        $this->country->create([
          'name' => $request['name']
        ]);

        return redirect()->route('ccountry.index')->with('success', 'Country Successfully Added!');
    }

	public function edit($id){
		$country = $this->country->find($id);
	    return view('backend.contact.country.edit')->with(compact('country'));
	}

	public function update(Request $request, $id)
    {

     $country = $this->country->find($id);
     $country->name = $request->name;
     $country->save();

     return redirect()->route('ccountry.index')->with('success', 'Country Successfully Updated!');
    }

    public function destroy($id)
    {
    	try{
	      $country = $this->country->find($id);
	      $country->delete();

	      return redirect()->route('ccountry.index')->with('success', 'Country Successfully Removed!');
	    }catch(\Exception $e){
        	return redirect()->route('ccountry.index')->with('error', 'Cannot Delete Country. It must be associated with a Partner!');
      }
    }
}
