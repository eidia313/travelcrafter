<?php

namespace App\Packages;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table        =   'bookings';
    protected  $fillable    = [
        'package', 'trip_start_date', 'trip_end_date', 'people_num',
        'full_name', 'dob', 'country', 'city', 'email',
        'phone_num', 'mobile_num', 'mailing_address',
        'emergency_contact_name', 'relationship',
        'emergency_phone'
    ];
}
