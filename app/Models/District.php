<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'location_districts';

    public $timestamps = false;
    protected $fillable = [
        'name', 'order'
    ];

    public function ward()
    {
        return $this->hasMany('App\Models\Ward', 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
