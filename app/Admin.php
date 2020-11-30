<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'contact_number',
        'photo',
        'access_level',
    ];
}
