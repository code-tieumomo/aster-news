<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravelista\Comments\Commentable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereIn;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, AsSource, Commentable, Attachable, Filterable, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category_id',
        'user_id',
        'image',
        'is_published',
    ];

    protected $with = [
        'category',
        'user',
    ];

    protected $allowedFilters = [
        'title' => Like::class,
        'description' => Like::class,
        'category_id' => WhereIn::class,
        'user_id' => WhereIn::class,
        'is_published' => Where::class,
    ];

    protected $allowedSorts = [
        'title',
        'description',
        'category_id',
        'user_id',
        'is_published',
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function searchableAs(): string
    {
        return 'posts';
    }

    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'is_published' => (bool) $this->is_published == 1,
        ];
    }
}
