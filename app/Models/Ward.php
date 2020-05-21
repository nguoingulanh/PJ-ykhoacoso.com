<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'location_wards';

    public $timestamps = false;
    protected $fillable = [
        'name', 'order'
    ];

    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
