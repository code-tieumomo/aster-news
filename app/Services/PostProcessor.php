<?php

namespace App\Services;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class PostProcessor
{
    public Crawler $domCrawler;

    public function __construct(Crawler $domCrawler)
    {
        $this->domCrawler = $domCrawler;
    }

    public function process($postId): string|bool
    {
        $post = Post::findOrFail($postId);

        Log::channel('process_post')->info('Processing post: ' . $post->title . ' - ' . $post->slug);

        $post->content = $this->processContent($post->content, $post->slug);
        $post->image = $this->processThumbnail($post->image, $post->slug);

        $post->is_published = true;
        $post->save();

        return true;
    }

    private function processContent(string $content = '', string $slug = ''): array|string|null
    {
        if (trim($content) == '') return '';

        // Archived
        // $content = preg_replace('/src="data:(.*?)"/', '', $content);
        // $content = preg_replace('/(data-src)/', 'src', $content);
        // $content = preg_replace('/style="(.*?)"/s', '', $content);
        // $content = preg_replace('/<div class="social-block(.*?)<\/div>/s', '', $content);
        // $content = preg_replace('/<div class="banner-ads(.*?)<\/div>/s', '', $content);
        // $content = preg_replace('/<div class="icon_blockvideo(.*?)<\/div>/s', '', $content);
        // $content = preg_replace('/<div class="ads(.*?)<\/div>/s', '', $content);
        // $content = preg_replace('/<div(.*?)widget_soccer(.*?)<\/div>/s', '', $content);
        // $content = preg_replace('/<p>(<br>)?<\/p>/', '', $content);

        // $content = preg_replace('/class=".*?"/', '', $content);

        $excepts = config('crawler.keep_html_tags');
        $content = $this->strip_tag_except($content, $excepts);

        $content = preg_replace('/\\n/', '', $content);
        $content = preg_replace('/\b(?!(data-src|src))([a-zA-Z][a-zA-Z0-9-]*)\s*=\s*["\'][^"\']*["\']/', '', $content);
        $content = preg_replace('/src="data:(.*?)"/', '', $content);
        $content = preg_replace('/(data-src)/', 'src', $content);
        $content = preg_replace('/style="(.*?)"/s', '', $content);

        $content = $this->processImageContent($content, $slug);

        return preg_replace('/<!--(.*?)-->/s', '', $content);
    }

    private function strip_tag_except($content = '', $excepts = [])
    {
        if (trim($content) == '') return '';

        $tags = implode('|', $excepts);

        return preg_replace('/<(?!\/?(' . $tags . ')\b)[^>]+>/i', '', $content);
    }

    private function processThumbnail(string $imageUrl = null, string $slug = ''): string
    {
        if (trim($imageUrl) == '') return 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';

        // $isDownloaded = Storage::put('post_images/' . $slug . '.jpg', file_get_contents($imageUrl));
        // return $isDownloaded ? Storage::url('post_images/' . $slug . '.jpg') : 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';

        $res = \Cloudinary::upload(
            $imageUrl,
            [
                'folder' => 'posts',
                'public_id' => $slug,
                'overwrite' => true,
                'resource_type' => 'image',
                'format' => 'jpg',
            ]
        );

        return $res->getSecurePath() ?? 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';
    }

    private function processImageContent(array|string|null $content, string $slug = '')
    {
        if (trim($content) == '') return '';

        $domCrawler = new Crawler($content);
        $images = $domCrawler->filter('img');
        if ($images->count() > 0) {
            $images->each(function ($imageEl, $i) use (&$content, $slug) {
                $imageUrl = $imageEl->attr('src');
                if (trim($imageUrl) != '' && preg_match('/https:\/\/res.cloudinary.com(.*)/m', $imageUrl) !== 1) {
                    $res = \Cloudinary::upload(
                        $imageUrl,
                        [
                            'folder' => 'contents',
                            'public_id' => $slug . '-' . $i,
                            'overwrite' => true,
                            'resource_type' => 'image',
                            'format' => 'jpg',
                        ]
                    );
                    $uploadedUrl = $res->getSecurePath() ?? 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';
                    $content = str_replace(htmlspecialchars($imageUrl), $uploadedUrl, $content);
                }
            });
        }

        return $content;
    }

    private function uploadImage($imageUrl, $publicId)
    {
        $res = \Cloudinary::upload(
            $imageUrl,
            [
                'folder' => 'contents',
                'public_id' => $publicId,
                'overwrite' => true,
                'resource_type' => 'image',
                'format' => 'jpg',
            ]
        );

        return $res->getSecurePath() ?? 'https://s1cdn.vnecdn.net/vnexpress/restruct/i/v777/logo_default.jpg';
    }
}
