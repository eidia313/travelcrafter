<?php

namespace App\Destination;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //

    //
    protected $table = 'region';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'status', 'country_id', 'latitude', 'longitude', 'slug'];

    //Region Can have country
    public function country()
    {
        return $this->belongsTo('App\Destination\Country');
    }

    //One Region Can Have Many Packages
    public function packages()
    {
        return $this->hasMany('App\Packages\Package');
    }
}
