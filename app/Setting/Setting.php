<?php

namespace App\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $table = "settings";
  protected $fillable = ['logo', 'altlogo', 'sitename', 'address', 'phonenumber', 'landline', 'email','facebook', 'twitter', 'instagram', 'youtube', 'whatsapp', 'videowebm', 'videomp', 'videoogg', 'tripsorganized', 'numofclients'];
}
