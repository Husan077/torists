<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Attractions extends Model
{
    use HasFactory, HasSlug;
    protected $guarded = [];

    public function  getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_ru')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(100)
            ->usingLanguage('ru');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
