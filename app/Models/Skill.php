<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'level',
        'category'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
