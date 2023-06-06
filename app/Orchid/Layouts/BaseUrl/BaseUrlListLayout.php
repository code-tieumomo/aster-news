<?php

namespace App\Orchid\Layouts\BaseUrl;

use App\Models\BaseUrl;
use Html;
use Illuminate\Support\Facades\Blade;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class BaseUrlListLayout extends \Orchid\Screen\Layouts\Table
{
    public $target = 'baseUrls';

    /**
     * @inheritDoc
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', __('ID'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (\App\Models\BaseUrl $baseUrl) => \Orchid\Screen\Actions\Link::make($baseUrl->id)
                    ->route('platform.systems.base_urls.edit', $baseUrl->id)),

            TD::make('url', __('Url'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (\App\Models\BaseUrl $baseUrl) => \Orchid\Screen\Actions\Link::make($baseUrl->url)
                    ->route('platform.systems.base_urls.edit', $baseUrl->id)),

            TD::make('status', __('Status'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (BaseUrl $baseUrl) {
                    return Html::tag('span', strtoupper($baseUrl->status), [
                        'class' => 'text-' . ($baseUrl->status == 'crawling' ? 'success' : 'danger'),
                    ]);
                }),

            TD::make('action', __('Actions'))
                ->render(function (BaseUrl $baseUrl) {
                    return Button::make(__(!$baseUrl->isCrawling() ? 'Start' : 'Stop'))
                        ->type(!$baseUrl->isCrawling() ? Color::SUCCESS : Color::DANGER)
                        ->icon(!$baseUrl->isCrawling() ? 'caret-right' : 'pause')
                        ->method('toggleCrawling')
                        ->parameters([
                            'id' => $baseUrl->id,
                        ]);
                }),
        ];
    }
}
