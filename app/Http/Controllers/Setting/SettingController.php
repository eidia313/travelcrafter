<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting\Setting;

class SettingController extends Controller
{
     public function __construct(Setting $setting){
       $this->setting = $setting;
     }

   public function index()
    {
      return view('backend.settings.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $setting = $this->setting->find($id);
      return view('backend.settings.edit')->with(compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = $this->setting->find($id);
        if(!empty($request['logo'])){
          $setting->logo = image_upload('logo', $request);
        }
        if(!empty($request['altlogo'])){
          $setting->altlogo = image_upload('altlogo', $request);
        }
        $setting->sitename = $request['sitename'];
        $setting->address = $request['address'];
        $setting->landline = $request['landline'];
        $setting->phonenumber = $request['phonenumber'];
        $setting->email = $request['email'];
        //Social Media
        $setting->facebook = $request['facebook'];
        $setting->twitter = $request['twitter'];
        $setting->instagram = $request['instagram'];
        $setting->youtube = $request['youtube'];
        $setting->whatsapp = $request['whatsapp'];
        //Meta Datas
        $setting->tripsorganized = $request['tripsorganized'];
        $setting->numofclients = $request['numofclients'];
        //Video
        $setting->promovideo = $request['promovideo'];
        if(!empty($request['videomp'])){
          $setting->videomp =  image_upload('videomp', $request);
        }
        if(!empty($request['videoogg'])){
          $setting->videoogg =  image_upload('videoogg', $request);
        }
        if(!empty($request['videowebm'])){
          $setting->videowebm =  image_upload('videowebm', $request);
        }
        $setting->save();
        return redirect()->back()->with('success', 'Activity Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage_old.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
