<?php

namespace App\Console\Commands;

use App\Crawler\Profile\VNEPostCrawlProfile;
use App\Models\CrawlerQueue;
use App\Models\Post;
use App\Observers\VNECrawlObserver;
use App\Queues\CrawlerCacheQueue;
use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlProfiles\CrawlInternalUrls;

class Vnecrawl extends Command
{
    public int $total_crawled = 0;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vnecrawl {site}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl a category from vnexpress.net';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $queue = null;
        $site = $this->argument('site');

        if (is_null($queue)) {
            $this->info('Preparing a new crawler queue');
            $queue = new CrawlerCacheQueue(86400);
        }

        $this->info('Start crawling');

        if ($queue->hasPendingUrls()) {
            $site = (string) $queue->getPendingUrl()->url;
        }

        Crawler::create()
            ->setParseableMimeTypes(['text/html', 'text/plain'])
            ->addCrawlObserver(new VNECrawlObserver($this))
            ->setTotalCrawlLimit(1000)
            ->setConcurrency(20)
            ->setCrawlQueue($queue)
            ->setCrawlProfile(new VNEPostCrawlProfile($site))
            ->startCrawling($site);

        $this->alert("Crawled {$this->total_crawled} items");

        if ($queue->hasPendingUrls()) {
            $this->alert('Has URLs left');
        } else {
            $this->info('Has no URLs left');
        }

        return 0;
    }
}
