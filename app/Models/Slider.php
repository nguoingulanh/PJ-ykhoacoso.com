<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sliders_title',
        'sliders_url',
        'sliders_image',
        'is_publish',
        'created_at',
        'updated_at',
    ];
}
