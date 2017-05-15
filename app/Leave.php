<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //get leave record
    public function employees()
    {
        return $this->belongsTo('App\Leave', 'emp_id');
    }
    public function leave_type()
    {
        return $this->hasOne('App\Leave_type');
    }
	public function leave_category()
    {
        return $this->hasOne('App\Leave_category', 'leave_cat_id');
    }
}
