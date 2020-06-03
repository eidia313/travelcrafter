<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "ccountry";
    protected $fillable = ['name'];

    public function partners(){
	    return $this->hasMany('App\Contact\Partners');
	}

}

