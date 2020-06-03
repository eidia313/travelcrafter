<?php

namespace App\Welfare;

use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    //
    protected $table = "social_welfare";
    protected $fillable = ['title', 'image', 'altitude', 'date', 'desc', 'sponsor'];
}
