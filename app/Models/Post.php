<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $with = ['category','tags'];
    public function getRouteKeyName()
    {
        return 'slug'; // Use 'slug' instead of 'id' for route model binding
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsTomany(Tag::class);
    }
}
