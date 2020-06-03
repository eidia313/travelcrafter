<?php

namespace App\Destination;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';
    protected $fillable = ['name', 'status', 'slug',  'cover_image'];

    //One Country Can Have Many Regions
    public function regions()
    {
        return $this->hasMany('App\Destination\Region');
    }

    //One Country Can Have Many Cities
    public function cities()
    {
        return $this->hasMany('App\Destination\City');
    }

    //One Country Can Have Many Packages
    public function packages()
    {
        return $this->hasMany('App\Packages\Package');
    }

    //One Country Can Have Many places
    public function places()
    {
        return $this->hasMany('App\Destination\Place','country_id');
    }

}
