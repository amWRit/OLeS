<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id', 'leave_type_id', 'leave_cat_id', 'from', 'to', 'note'
    ];
    

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
