<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'status',
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_state');
    }
    
}
