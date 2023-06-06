<?php

namespace App\Orchid\Screens\BaseUrl;

use App\Models\BaseUrl;
use App\Orchid\Layouts\BaseUrl\BaseUrlListLayout;
use App\Orchid\Layouts\BaseUrl\BaseUrlLogLayout;
use App\View\Components\BaseUrlLog;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class BaseUrlListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $baseUrls = BaseUrl::paginate(10);

        return [
            'baseUrls' => $baseUrls,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Base URLs';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add')
                ->icon('plus-circle')
                ->route('platform.systems.base_urls.create'),
            Button::make('Start All')
                ->icon('play')
                ->type(Color::SUCCESS)
                ->method('startAll'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            BaseUrlListLayout::class,
            Layout::component(BaseUrlLog::class),
        ];
    }

    /**+
     * @param Request $request
     */
    public function toggleCrawling(Request $request): void
    {
        try {
            $baseUrl = BaseUrl::findOrFail($request->id);
            $baseUrl->status = $baseUrl->status == 'crawling' ? 'stopping' : 'crawling';
            $baseUrl->save();
            Alert::success('Update status for ' . $baseUrl->url . ' successfully');
        } catch (\Exception $e) {
            Alert::error('Base URL not found');
        }
    }

    public function startAll(): void
    {
        $baseUrls = BaseUrl::query()->update(['status' => BaseUrl::STATUS_CRAWLING]);
        Alert::success('Start all base urls successfully');
    }
}
