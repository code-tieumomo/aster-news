<?php

namespace App\Console\Commands;

use App\Jobs\CrawlUrl;
use App\Models\BaseUrl;
use Illuminate\Console\Command;

class CreateJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push base url to queue for crawling';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrls = BaseUrl::crawling()->get();

        foreach ($baseUrls as $baseUrl) {
            CrawlUrl::dispatch($baseUrl->url)->onQueue('crawl_url');
        }

        return 0;
    }
}
