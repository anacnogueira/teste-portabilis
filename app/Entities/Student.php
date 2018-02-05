<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function setDateBirthAttribute($value) 
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        $this->attributes['date_birth'] = Carbon::parse($date)->format('Y-m-d');
    }

    public function getDateBirthAttribute($value) 
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
