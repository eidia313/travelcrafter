<?php

namespace App\Tailor;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $table = 'trips';
    protected $fillable = [
      'destination_id', 'date', 'season', 'duration', 'adults', 'children',
        'hotel_class', 'interest', 'title', 'full_name', 'email',
        'phone','nationality', 'contact_way', 'find_us', 'fitnesslevel', 'specialattn', 'firsttime'

    ];


    public function activity(){
        return $this->belongsToMany('App\Activities\Activity', 'activity_trips', 'trip_id', 'activity_id');
    }

    public function destination(){
        return $this->belongsTo('App\Destination\Country', 'destination_id');
    }


}
