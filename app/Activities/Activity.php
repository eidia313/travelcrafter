<?php

namespace App\Activities;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $table = "activity";
    protected $fillable = ['name', 'image', 'thumbnail', 'status', 'desc', 'slug'];

    //One Region Can Have Many Packages
    public function packages()
    {
        return $this->hasMany('App\Packages\Package');
    }

    public function places()
    {
        return $this->hasMany('App\Destination\Place');
    }

    public function trip()
    {
        return $this->belongsToMany('App\Tailor\Trip', 'activity_trips', 'activity_id', 'trip_id');
    }
}