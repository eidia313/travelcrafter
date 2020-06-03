<?php

namespace App\Checklists;

use Illuminate\Database\Eloquent\Model;

class CheckListGroup extends Model
{
    //
    public function categories()
    {
        return $this->belongsToMany('App\Checklists\CheckListCategory','checklistcategory_checklistgroup','group_id', 'category_id')->withTimestamps();
    }

    /**
     * Get the packages for the checklist group.
     */
    public function packages()
    {
        return $this->hasMany('App\Packages\Package','checklist_group_id');
    }

}
