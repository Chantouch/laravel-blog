<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialLogin extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
