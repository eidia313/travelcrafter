<?php

namespace App\Packages;

use Illuminate\Database\Eloquent\Model;

class PackageGallery extends Model
{
    //
    // Get the package that owns the images.
    public function package(){
        return $this->belongsTo('App\Packages\Package', 'package_id');
    }
}
