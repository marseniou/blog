<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'slug',
        'show_on_menu',
    ];
    protected $casts = [
        'name' => 'array',
        'slug' => 'string',
        'show_on_menu' => 'boolean'
    ];
    public array $translatable = [
        'name',

    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function show_on_menu()
    {
        return $this->show_on_menu ? true : false;
    }

}
