<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_category');
    }
}
