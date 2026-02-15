<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_type');
    }
}
