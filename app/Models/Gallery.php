<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = ['name', 'user_id', 'description'];


    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
