<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseUrlLog extends Component
{
    public ?string $processPostLog;
    public ?string $crawlUrlLog;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $processPostFile = escapeshellarg(storage_path('logs/process_post.log'));
        $this->processPostLog = `tail -n 30 $processPostFile`;

        $crawlUrlFile = escapeshellarg(storage_path('logs/crawl_url.log'));
        $this->crawlUrlLog = `tail -n 30 $crawlUrlFile`;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
            <div>
                <h6>Last 30 line of crawl url log</h6>
                @dump($crawlUrlLog)
            </div>

            <div>
                <h6>Last 30 line of process post log</h6>
                @dump($processPostLog)
            </div>
        blade;
    }
}
