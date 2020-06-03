<?php

namespace App\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table        =   'pages';
    protected  $fillable    = [
        'title', 'slug','description', 'image', 'status'
    ];
}
