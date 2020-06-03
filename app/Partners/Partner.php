<?php

namespace App\Partners;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table        =   'partners';
    protected  $fillable    = ['name', 'address','company', 'country', 'city', 'number', 'status', 'number', 'email'];

    
}
