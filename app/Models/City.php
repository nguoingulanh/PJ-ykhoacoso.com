<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'location_cities';

    public $timestamps = false;
    protected $fillable = [
        'name', 'order'
    ];

    public function district()
    {
        return $this->hasMany(District::class, 'city_id');
    }

}
