<?php

namespace App\Models;

use App\Models\User;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title',
        'slug',
        'featured_image',
        'excerpt',
        'content',
        'active',
        'user_id',
        'show_featured',
        'category_id'
    ];

    protected $casts = [
        'title' => 'array',
        'excerpt' => 'array',
        'content' => 'array',
    ];
    protected $translatable = [
        'title',
        'excerpt',
        'content',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function showFeatured()
    {
        return $this->show_featured ? true : false;
    }
    public function active()
    {
        return $this->active ? true : false;
    }

}
