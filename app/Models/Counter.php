<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = [
        'job_post_id',
        'view_count',
        'apply_count',
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
}
