<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'body'];

    /**
     * Satu post memiliki banyak komentar.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class, 'post_id');
    }
}
