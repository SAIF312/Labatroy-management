<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
       'Admin_id' , 'details', 'amount'
    ];
}
