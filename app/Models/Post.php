<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'meta_title',
        'meta_description',
        'tags',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'content' => 'array',      // Memperbaiki error foreach
        'tags' => 'array',         // Agar Filament TagsInput berfungsi
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
