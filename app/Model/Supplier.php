<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
       'Admin_id' , 'name', 'email', 'address', 'phone', 'photo'
    ];
}
