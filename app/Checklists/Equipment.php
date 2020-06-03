<?php

namespace App\Checklists;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    /**
     * Get the category that owns the Equipment.
     */
    public function category()
    {
        return $this->belongsTo('App\Checklists\CheckListCategory','category_id');
    }
}
