<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mvdnbrk\EloquentExpirable\Expirable;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlUrl;

class CrawlerQueue extends Model
{
    use Expirable, SoftDeletes;

    protected string $HASH_ALGO = 'sha3-512';

    protected $fillable = [
        'url_hash',
        'url_class',
        'html',
        'expires_at',
        'url',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('withoutExpired', function (Builder $builder) {
            $builder->withoutExpired();
        });
    }

    protected function html(): Attribute
    {
        return Attribute::make(
            get: function ($html) {
                return json_decode($html);
            },
            set: function (string $html) {
                $html = preg_replace('/\R+/', ' ', $html);

                return json_encode($html);
            }
        );
    }

    protected function urlClass(): Attribute
    {
        return Attribute::make(
            get: fn ($crawlUrl) => unserialize($crawlUrl, ['allowed_classes' => true]),
            set: function ($crawlUrl) {
                $url = (string) $crawlUrl->url;

                return [
                    'url' => $url,
                    'url_hash' => hash($this->HASH_ALGO, $url),
                    'url_class' => serialize($crawlUrl),
                ];
            }
        );
    }

    /**
     * Search by url hash.
     *
     * @param Builder $query
     * @param UriInterface|CrawlUrl|string $crawlUrl
     * @return Builder
     */
    public function scopeUrl(Builder $query, UriInterface|CrawlUrl|string $crawlUrl): Builder
    {
        if ($crawlUrl instanceof CrawlUrl) {
            $urlString = (string) $crawlUrl->url;
        } elseif ($crawlUrl instanceof UriInterface) {
            $urlString = (string) $crawlUrl;
        } else { // string
            $urlString = $crawlUrl;
        }

        return $query->where('url_hash', hash($this->HASH_ALGO, $urlString));
    }
}
