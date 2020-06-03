<?php

namespace App\Destination;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'city';

    protected $fillable = ['name', 'status', 'country_id', 'slug'];

    //City Can have country
    public function country()
    {
        return $this->belongsTo('App\Destination\Country');
    }

    //One city Can Have Many places
    public function places()
    {
        return $this->hasMany('App\Destination\Place','city_id');
    }
}
