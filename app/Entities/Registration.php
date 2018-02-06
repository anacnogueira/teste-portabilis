<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

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
}
