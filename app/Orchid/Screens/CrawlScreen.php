<?php

namespace App\Orchid\Screens;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class CrawlScreen extends Screen
{
    public bool $isCrawling = false;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Crawl';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Start')
                ->icon('skip-start')
                ->method('startCrawling')
                ->canSee(!$this->isCrawling),
            Button::make('Stop')
                ->icon('skip-start')
                ->method('stopCrawling')
                ->canSee($this->isCrawling),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [];
    }

    public function startCrawling()
    {
        $this->isCrawling = true;
        exec('cd ./../ && pm2 start pm2.config.cjs', $execOutput);
        // $runOutput = Process::path(__DIR__)->run('cd ./../../../ && pm2 start pm2.config.cjs')->output();
        sleep(5);
        $lsOutput = Process::path(__DIR__)->run('cd ./../../../ && pm2 ls')->output();
        dd($execOutput, $lsOutput);
    }

    public function stopCrawling()
    {
        $this->isCrawling = false;
        // dd(Process::path(__DIR__)->run('cd ./../../../ && ll')->output());
    }
}
