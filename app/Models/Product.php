<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'content',
        'original_price',
        'price',
        'img',
        'totalProduct',
        'tag',
        'status',
        'description',
    ];
}
