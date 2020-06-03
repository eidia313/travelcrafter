<?php

namespace App\Contact;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = "clist";
    protected $fillable = ['name', 'email', 'phone', 'city'];

    public function countries(){
        return $this->belongsTo('App\Contact\Country', 'c_id');
    }

}
