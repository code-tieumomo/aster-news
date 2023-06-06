<?php

namespace App\Crawler\Profile;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class VNEPostCrawlProfile extends \Spatie\Crawler\CrawlProfiles\CrawlProfile
{
    protected mixed $baseUrl;

    public function __construct($baseUrl)
    {
        if (!$baseUrl instanceof UriInterface) {
            $baseUrl = new Uri($baseUrl);
        }

        $this->baseUrl = $baseUrl;
    }

    public function shouldCrawl(UriInterface $url): bool
    {
        return $this->baseUrl->getHost() === $url->getHost();
    }
}
