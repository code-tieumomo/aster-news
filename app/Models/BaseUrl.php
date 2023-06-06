<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class BaseUrl extends Model
{
    use HasFactory, AsSource, Filterable;

    public const STATUS_CRAWLING = 'crawling';
    public const STATUS_STOPPING = 'stopping';

    protected $fillable = [
        'url',
        'status',
    ];

    protected $allowedFilters = [
        'url',
        'status',
    ];

    public function isCrawling()
    {
        return $this->status === 'crawling';
    }

    public function scopeCrawling($query)
    {
        return $query->where('status', self::STATUS_CRAWLING);
    }
}
