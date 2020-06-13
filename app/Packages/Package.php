<?php

namespace App\Packages;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $table = "package";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'altitude', 'accomodation', 'trip_highlights', 'duration', 'cover_image', 'thumbnail', 'itinerary', 'difficulty_id', 'best_season', 'slug'];

    //Difficulty Can have multiple Packages
    public function difficulty()
    {
        return $this->belongsTo('App\Packages\Difficulty');
    }

    //Country Can have multiple Packages
    public function country()
    {
        return $this->belongsTo('App\Destination\Country');
    }

    //Region Can have multiple Packages
    public function region()
    {
        return $this->belongsTo('App\Destination\Region');
    }

    //Activity Can have multiple Packages
    public function activity()
    {
        return $this->belongsTo('App\Activities\Activity');
    }

    public function checklistgroup()
    {
        return $this->belongsTo('App\Checklists\ChecklistGroup');
    }

    public function images()
    {
        return $this->hasMany('App\Packages\PackageGallery', 'package_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Checklists\CheckListGroup', 'checklist_group_id');
    }

    public function placeType()
    {
        return $this->belongsTo('App\Places\PlaceType');
    }
}