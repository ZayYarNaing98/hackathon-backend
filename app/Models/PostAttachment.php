<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'post_id',
        'attachment_url'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
