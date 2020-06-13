<?php

namespace App\Places;

use Illuminate\Database\Eloquent\Model;

class PlaceType extends Model
{
    protected $table = 'placetype';

    protected $fillable = ['name', 'status'];

    //One Place type Can Have Many places
    public function places()
    {
        return $this->hasMany('App\Destination\Place');
    }

    public function packages()
    {
        return $this->hasMany('App\Packages\Package');
    }
}