<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'registration_id','type', 'value_paid', 'change', 'paid'
    ];

    public function registration()
    {
        return $this->belongsTo('App\Entities\Registration');
    }

    public function setValuePaidAttribute($value) 
    {
        
        $this->attributes['value_paid'] = str_replace(",", ".", str_replace(".", "",$value));
    }

    public function setChangeAttribute($value) 
    {
        
        $this->attributes['change'] = str_replace("R$ ","",str_replace(",", ".", str_replace(".", "",$value)));
    }


    // public function getValuePaidAttribute($value) 
    // {
    //     return "R$ ".number_format($value,2,',','.');
    // }

    // public function getChangeAttribute($value) 
    // {
    //     return "R$ ".number_format($value,2,',','.');
    // }

    public function getCreatedAtAttribute($value) 
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    
}
