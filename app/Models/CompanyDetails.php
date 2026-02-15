<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'website',
        'email',
        'phone',
        'status',
    ];

    public function jobPosts()
    {
        //return $this->hasOne(JobPost::class);
        return $this->hasMany(JobPost::class,'company_detail_id');
    }
}
