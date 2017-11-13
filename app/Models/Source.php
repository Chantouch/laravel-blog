<?php

namespace App\Models;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'title', 'url', 'translator', 'post_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
