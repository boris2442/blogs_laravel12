<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $with = ['category'];
    public function getRouteKeyName()
    {
        return 'slug'; // Use 'slug' instead of 'id' for route model binding
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
