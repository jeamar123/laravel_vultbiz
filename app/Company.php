<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'company';
    protected $fillable = [
        'company_name', 
        'email', 
        'password', 
        'address',
        'contact_number',
        'photo',
        'latitude',
        'longitude',
        'activated',
        'nature_of_business',
    ];
}
