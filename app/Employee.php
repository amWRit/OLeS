<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //get leave record
    public function leave()
    {
        return $this->hasMany('App\Leave', 'emp_id');
    }
}
