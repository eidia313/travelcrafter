<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Service;

class ServiceController extends Controller
{
    public function __construct(Service $service){
      $this->service = $service;
    }

    public function index()
    {
      $services = $this->service->orderBy('id', 'desc')->get();
      return view('backend.services.service.index')->with(compact('services'));
    }

    public function create()
    {
        return view('backend.services.service.create');
    }


    public function store(Request $request)
    {
      $this->validate($request, [
         'title' => 'required|unique:services',
         'image' => 'image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
      ]);

      //Handle File Upload
      $file = image_upload('image', $request);
      $services = new Service();
      $services->title = $request->title;
      $services->description = $request->description;
      $services->image = $file;
      if($request->isHomePage != null){
        $services->isHomePage  =  1;
      }else{
        $services->isHomePage  =  0;
      }
      $services->save();
      return redirect()->route('service.index')->with('success', 'Services Successfully Created!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $service = $this->service->find($id);
      return view('backend.services.service.edit')->with(compact('service'));
    }

    public function update(Request $request, $id)
    {
      try{
        $service = $this->service->find($id);
        $service->title = $request['title'];
        if(!empty($request['image']))
          $service->image = image_upload('image', $request);
        $service->description = $request['description'];
        if($request->isHomePage != null){
          $service->isHomePage = 1;
        }else{
          $service->isHomePage = 0;
        }
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service Successfully Updated!');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Errors in field!');
      }
    }


    public function destroy($id)
    {
      $service = $this->service->find($id);
      //Delete File using Laravel Storage.
      Storage::disk('public')->delete('images/'.$service->image);
      $service->delete();

      return redirect()->route('service.index')->with('success', 'Service Successfully Deleted!');
    }
}
