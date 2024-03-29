<?php

namespace Uptoolkit\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use NodeTrait, HasSlug;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categories(): MorphTo
    {
        return $this->morphTo();
    }

    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'model', 'categorisables');
    }

    public static function tree(): array
    {
        return static::get()->toTree()->toArray();
    }

    public static function findByName(string $name): self
    {
        return static::where('name', $name)->orWhere('slug', $name)->firstOrFail();
    }

    public static function findById(int $id): self
    {
        return static::findOrFail($id);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }
}
