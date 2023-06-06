<?php

namespace App\Observers;

use App\Jobs\ProcessPost;
use App\Models\BaseUrl;
use App\Models\Category;
use App\Models\CrawlerQueue;
use App\Models\Post;
use App\Models\User;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObservers\CrawlObserver as SpatieCrawlObserver;
use Symfony\Component\DomCrawler\Crawler;
use function Termwind\render;

class VNECrawlObserver extends SpatieCrawlObserver
{
    // protected Command $console;
    protected $url;

    // public function __construct(Command $console)
    public function __construct($url)
    {
        // $this->console = $console;
        $this->url = $url;
    }

    public function willCrawl(UriInterface $url): void
    {
        Log::channel('crawl_url')->info("Will crawl: {$url}");
    }

    /**
     * @inheritDoc
     */
    public function crawled(UriInterface $url, ResponseInterface $response, ?UriInterface $foundOnUrl = null): void
    {
        // $this->console->total_crawled++;
        Log::channel('crawl_url')->info("Crawled: {$url}");

        if (preg_match('/https:\/\/vnexpress.net\/([^\/]*)-(\d+).html/m', $url) === 1) {
            $html = (string) $response->getBody();
            $domCrawler = new Crawler($html);

            try {
                Post::withoutSyncingToSearch(function () use ($domCrawler) {
                    $title = $domCrawler->filter('h1.title-detail')->text();
                    $slug = Str::slug($title);

                    $breadcrumb = $domCrawler->filter('ul.breadcrumb > li');
                    if ($breadcrumb->count() > 0) $category = $this->processCategories($breadcrumb);
                    else $category = Category::first();

                    $description = $domCrawler->filter('p.description')->html();
                    $description = preg_replace('/<span(.*?)<\/span>/', '', $description);

                    try {
                        $image = $domCrawler->filter('meta[property="og:image"]')->attr('content');
                    } catch (Exception $e) {
                        $image = 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';
                    }

                    $content = $domCrawler->filter('article.fck_detail')->html();

                    $user_id = User::inRandomOrder()->first()->id;
                    $category_id = $category->id;


                    $post = Post::create([
                        'title' => $title,
                        'slug' => $slug,
                        'image' => $image,
                        'description' => $description,
                        'content' => $content,
                        'user_id' => $user_id,
                        'category_id' => $category_id,
                        'is_published' => false,
                    ]);
                    ProcessPost::dispatch($post->id)->onQueue('process_post');
                });
            } catch (\Exception $e) {
                Log::channel('crawl_url')->error("Crawl failed: {$url} because {$e->getMessage()}");
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function crawlFailed(UriInterface $url, RequestException $requestException, ?UriInterface $foundOnUrl = null): void
    {
        Log::channel('crawl_url')->error("Crawl failed: {$url}");
    }

    public function finishedCrawling(): void
    {
        Log::channel('crawl_url')->info('Sleep crawling');
        // BaseUrl::where('url', $this->url)->update(['status' => BaseUrl::STATUS_STOPPING]);
    }

    private function processCategories(Crawler $breadcrumb)
    {
        $cateElement = $breadcrumb->first();

        $cateName = $cateElement->filter('a')->attr('title');
        $cateSlug = str_replace('/', '', $cateElement->filter('a')->attr('href'));

        return Category::updateOrCreate([
            'slug' => $cateSlug,
        ], [
            'name' => $cateName,
        ]);
    }
}
