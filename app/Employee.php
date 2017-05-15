<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $table = 'employees';
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name', 'l_name', 'dob', 'dob', 'join_date', 'dept', 'emp_type'
    ];


    //get leave record
    public function leave()
    {
        return $this->hasMany('App\Leave', 'emp_id');
    }
}
