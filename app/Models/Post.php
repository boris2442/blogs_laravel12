<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'category_id',
        'user_id',
        'tags_ids', // This is used to store the IDs of the tags associated with the
    ];
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
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
