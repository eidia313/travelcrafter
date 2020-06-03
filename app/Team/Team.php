<?php

namespace App\Team;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $table = 'team';
  protected $fillable = ['name', 'designation'];
}
