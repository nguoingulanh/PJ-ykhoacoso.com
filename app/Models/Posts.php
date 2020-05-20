<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'title_seo',
        'description',
        'description_seo',
        'content',
        'post_tag',
        'photo',
        'slug',
        'is_published',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function Category()
    {
        return $this->belongsToMany(Category::class, 'posts_categories', 'post_id', 'category_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'created_by');
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $userId = \Auth::id();
            $model->created_by = $userId;
            $model->updated_by = $userId;
        });
        static::updating(function ($model) {
            $model->updated_by = \Auth::id();
        });
    }
}
