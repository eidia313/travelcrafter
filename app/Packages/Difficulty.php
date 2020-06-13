<?php

namespace App\Packages;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    protected $table = "difficulty";
    protected $fillable = ['name', 'desc', 'image'];

    //One Difficulty Can Have Many Pacakges
    public function packages()
    {
        return $this->hasMany('App\Packages\Package');
    }
}