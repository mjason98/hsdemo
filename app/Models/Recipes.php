<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class Recipes extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'instructions',
        'users_id',
    ];

    protected $hidden = [
        'created_at',
    ];

    // Model Relationships -----------------------------------------------------
    public function author()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function getImageUrl($conversion)
    {
        return ($this->media->isNotEmpty())
            ? $this->media->first()->getUrl($conversion)
            : '/imgs/recipe_'.$conversion.'.jpg';
    }

    // Medialibrary settings ----------------------------------------------------------
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 500, 400)
            ->nonQueued();
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 128, 128)
            ->nonQueued();

    }

    public function getSlugOptions(): SlugOptions
    {
        $randomString = Str::random(6);

        return SlugOptions::create()
            ->generateSlugsFrom(['title', $randomString])
            ->saveSlugsTo('slug');
    }
}
