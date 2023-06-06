<?php

namespace App\Queues;

use App\Models\CrawlerQueue;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlQueues\CrawlQueue;
use Spatie\Crawler\CrawlUrl;
use Spatie\Crawler\Exceptions\UrlNotFoundByIndex;

class CrawlerCacheQueue implements CrawlQueue
{
    /**
     * Define expiry of cached URLs.
     *
     * @var int|null
     */
    protected mixed $ttl = null;

    public function __construct(int $ttl = null)
    {
        $this->ttl = $ttl ?? config('crawler.cache.ttl', 86400); // one day
    }

    public function add(CrawlUrl $crawlUrl): CrawlQueue
    {
        if (!$this->has($crawlUrl)) {
            $crawlUrl->setId((string) $crawlUrl->url);

            $item = new CrawlerQueue;

            $item->url_class = $crawlUrl;
            $item->expires_at = $this->ttl;

            $item->save();
        }

        return $this;
    }

    /**
     * Marks the given URL as processed
     *
     * @param CrawlUrl $crawlUrl
     * @return void
     */
    public function markAsProcessed(CrawlUrl $crawlUrl): void
    {
        // @OBS deleted_at = soft delete = processado
        CrawlerQueue::url($crawlUrl)->delete();
    }

    public function getPendingUrl(): ?CrawlUrl
    {
        // Any URLs left?
        if ($this->hasPendingUrls()) {
            // $random = CrawlerQueue::inRandomOrder()->first();
            $random = CrawlerQueue::first();

            return $random->url_class;
        }

        return null;
    }

    public function has(UriInterface|CrawlUrl|string $crawlUrl): bool
    {
        // dd((bool) CrawlerQueue::withTrashed()->url($crawlUrl)->count());

        return (bool) CrawlerQueue::withTrashed()->url($crawlUrl)->count();
    }

    public function hasPendingUrls(): bool
    {
        return (bool) CrawlerQueue::count();
    }

    public function getUrlById($id): CrawlUrl
    {
        if (!$this->has($id)) {
            throw new UrlNotFoundByIndex("Crawl url {$id} not found in collection.");
        }
        $item = CrawlerQueue::withTrashed()->url($id)->first();

        return $item->url_class;
    }

    public function hasAlreadyBeenProcessed(CrawlUrl $url): bool
    {
        $inQueue = (bool) CrawlerQueue::url($url)->count();
        $processed = (bool) CrawlerQueue::onlyTrashed()->url($url)->count();

        if ($inQueue) {
            return false;
        }

        if ($processed) {
            return true;
        }

        return false;
    }

    public function getProcessedUrlCount(): int
    {
        $processed = CrawlerQueue::onlyTrashed()->count();
        $pending = CrawlerQueue::count();

        return $processed - $pending;
    }
}
