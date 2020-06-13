<?php

namespace App\Destination;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * Get the country that owns the place.
     */
    public function country()
    {
        return $this->belongsTo('App\Destination\Country', 'country_id');
    }

    /**
     * Get the city that owns the place.
     */
    public function city()
    {
        return $this->belongsTo('App\Destination\City', 'city_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Destination\Region');
    }

    public function placetype()
    {
        return $this->belongsTo('App\Places\PlaceType');
    }

    public function activity()
    {
        return $this->belongsTo('App\Activities\Activity');
    }
}