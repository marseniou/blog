<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class Member extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'position',
        'excerpt',
        'content',
        'image',
        'slug',
        'active',
        'university',
        'weight'
    ];

    protected $translatable = ['name', 'position', 'excerpt', 'content', 'university'];
    protected $casts = ['name' => 'array', 'position' => 'array', 'excerpt' => 'array', 'content' => 'array', 'university' => 'array'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
