<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile_id',
        'title',
        'description',
    ];

    public function profile():BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function post_attachment(): HasMany
    {
        return $this->hasMany(PostAttachment::class);
    }
}
