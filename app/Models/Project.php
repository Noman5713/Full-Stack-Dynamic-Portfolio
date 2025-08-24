<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'github_url',
        'demo_url',
        'images',
        'type',
        'reference',
        'tools',
        'keywords',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
        'tools' => 'array',
        'keywords' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
