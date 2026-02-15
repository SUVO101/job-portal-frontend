<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'keywords',
        'cover_photo',
        'content',
        'company_detail_id',
        'location',
        'salary',
        'apply_link',
        'is_featured',
        'is_urgent',
        'status',
        'expired_at',
    ];

    public function companyDetail()
    {
        return $this->belongsTo(CompanyDetails::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_post_category');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'job_post_subcategory');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'job_post_type');
    }

    public function states()
    {
        return $this->belongsToMany(State::class, 'job_post_state');
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    // protected static function booted()
    // {
    //     static::created(function ($jobPost) {
    //         $jobPost->counter()->create(['views' => 0]);
    //     });
    // }
    public function counter()
    {
        return $this->hasOne(Counter::class);
    }

    
}

