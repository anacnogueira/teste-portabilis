<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Registration extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo('App\Entities\Student');
    }

    public function course()
    {
        return $this->belongsTo('App\Entities\Course');
    } 

    public function payments()
    {
        return $this->hasMany('App\Entities\Payment');
    }    

     public function getCanceledAtAttribute($value) 
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }
}
