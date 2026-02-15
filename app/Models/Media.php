<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'job_post_id',
        'file_name',
        'file_path',
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }
}
