<?php

namespace App\Http\Controllers\Packages;

use App\Packages\Package;
use App\Packages\PackageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Storage;
class PackageGalleryController extends Controller
{
    public function getPackageImages($packageId){
        $packageId=$packageId;
        $package=Package::findOrFail($packageId);
        $galleries= PackageGallery::where('package_id',$packageId)->latest()->paginate(8);
        return view('backend.packages.gallery.index',compact('packageId','galleries','package'));
    }

    public function storeImages(Request $request){

        $this->validate($request, [
            'package_id' =>'required',
            'image' => 'required',
            'image.*' => 'image',
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $package_image){

                $gallery= new PackageGallery();
                $gallery->package_id = $request->package_id;

                $filenameToStore = multiple_image_upload($package_image, $request);

                $gallery->caption=$request->caption;

                $gallery->image=$filenameToStore;
                $gallery->save();
            }

            Session::flash('success', 'Image Was Added To The Package!');
            return redirect()->route('gallery.index',$request->package_id);

        }
    }

    public function deleteImages($id){
        $gallery= PackageGallery::findOrFail($id);
        $imageToBeDeleted=$gallery->image;
        $package=Package::findOrFail($gallery->package_id);
        $gallery->delete();
        //delete Image too
        Storage::disk('public')->delete('images/'.$imageToBeDeleted);
        Session::flash('success', 'Image Was Deleted!');
        return redirect()->route('gallery.index',$package->id);
    }
}
