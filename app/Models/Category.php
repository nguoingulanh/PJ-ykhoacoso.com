<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = 'category';

    protected $fillable = ['title', 'slug', 'description', 'type_page'];

    public function breadcrumbName()
    {
        return $this->title;
    }

    public function Posts(){
        return $this->belongsToMany(Posts::class,'posts_categories', 'category_id', 'post_id');
    }
}
