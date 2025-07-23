<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
     public function posts():BelongsToMany{
        return $this->belongTomany(Post::class);
    }
    public function getRouteKeyName()
    {
        return 'slug'; // Use 'slug' instead of 'id' for route model binding
    }
}
