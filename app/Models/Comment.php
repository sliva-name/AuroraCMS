<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'text',
    ];

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Post::class);
    }
}
