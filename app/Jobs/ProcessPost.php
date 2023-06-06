<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\PostProcessor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $postId;
    public int $tries = 3;
    public int $timeout = 180;

    /**
     * Create a new job instance.
     */
    public function __construct(int $postId)
    {
        $this->postId = $postId;
    }

    /**
     * Execute the job.
     */
    public function handle(PostProcessor $postProcessor): void
    {
        $start = microtime(true);
        $isProcessed = $postProcessor->process($this->postId);
        $end = microtime(true);
        Log::channel('process_post')->info('Processed post in ' . ($end - $start) . ' seconds');
    }
}
