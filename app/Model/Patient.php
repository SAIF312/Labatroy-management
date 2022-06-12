<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
       'Admin_id', 'name', 'email', 'age', 'cnic' , 'phone', 'photo', 'gender','reffered_by'
    ];
}
