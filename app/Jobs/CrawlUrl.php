<?php

namespace App\Jobs;

use App\Crawler\Profile\VNEPostCrawlProfile;
use App\Models\BaseUrl;
use App\Observers\VNECrawlObserver;
use App\Queues\CrawlerCacheQueue;
use GuzzleHttp\RequestOptions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\Crawler\Crawler;

class CrawlUrl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 180;

    private string $url;

    /**
     * Create a new job instance.
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        Log::channel('crawl_url')->info("Create job crawl for base: {$url}");
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $queue = null;
        $url = $this->url;
        $oriUrl = $this->url;

        if (is_null($queue)) {
            $queue = new CrawlerCacheQueue(86400);
        }

        if ($queue->hasPendingUrls()) {
            $url = (string) $queue->getPendingUrl()->url;
        }

        Crawler::create([
            RequestOptions::ALLOW_REDIRECTS => true,
            RequestOptions::TIMEOUT => 60,
            RequestOptions::CONNECT_TIMEOUT => 60,
        ])
            ->setParseableMimeTypes(['text/html', 'text/plain'])
            ->addCrawlObserver(new VNECrawlObserver($oriUrl))
            ->setConcurrency(30)
            ->setCrawlQueue($queue)
            ->setCurrentCrawlLimit(30)
            ->setTotalCrawlLimit(200)
            ->setCrawlProfile(new VNEPostCrawlProfile($url))
            ->setDelayBetweenRequests(200)
            ->startCrawling($url);

        // BaseUrl::where('url', $oriUrl)->update(['status' => BaseUrl::STATUS_STOPPING]);
        Log::channel('crawl_url')->info("Stop crawl from base: {$url}");
    }
}
