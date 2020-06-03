<?php

namespace App\Checklists;

use Illuminate\Database\Eloquent\Model;

class CheckListCategory extends Model
{

    /**
     * Get the equipments for the category.
     */
    public function equipments()
    {
        return $this->hasMany('App\Checklists\Equipment','category_id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Checklists\CheckListGroup','checklistcategory_checklistgroup','category_id', 'group_id')->withTimestamps();
    }
}
