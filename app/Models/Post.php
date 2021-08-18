<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'body','image','category_id',
    ];
    
    public function posts_categories() {
      return $this->belongsTo(PostsCategory::class);
    }
}
