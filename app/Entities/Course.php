<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function setMonthlyAmountAttribute($value) 
    {
        
        $this->attributes['monthly_amount'] = str_replace(",", ".", str_replace(".", "",$value));
    }

    public function setRegistrationTaxAttribute($value) 
    {
        
        $this->attributes['registration_tax'] = str_replace(",", ".", str_replace(".", "",$value));
    }

    public function getMonthlyAmountAttribute($value) 
    {
        return "R$ ".number_format($value,2,',','.');
    }

    public function getRegistrationTaxAttribute($value) 
    {
        return "R$ ".number_format($value,2,',','.');
    }
}
