<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'image_url',
        'live_url',
        'github_url',
        'category',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];
}
