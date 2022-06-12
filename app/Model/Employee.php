<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'Admin_id', 'name', 'email', 'address', 'cnic' , 'phone', 'photo', 'jd','salary'
    ];
}
