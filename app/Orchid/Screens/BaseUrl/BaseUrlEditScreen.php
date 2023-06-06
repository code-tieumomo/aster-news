<?php

namespace App\Orchid\Screens\BaseUrl;

use App\Models\BaseUrl;
use App\Orchid\Layouts\User\UserEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class BaseUrlEditScreen extends Screen
{
    public $baseUrl;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(BaseUrl $baseUrl): iterable
    {
        return [
            'baseUrl' => $baseUrl,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->baseUrl->exists ? 'Edit Base URL' : 'Create Base URL';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            // Button::make('Save')
            //     ->icon('save')
            //     ->method('saveBaseUrl'),
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
            Layout::block(
                Layout::rows([
                    Input::make('baseUrl.url')
                        ->title('URL')
                        ->placeholder('https://www.example.com'),
                    Select::make('baseUrl.status')
                        ->title('Status')
                        ->options([
                            'stopping' => 'Stopping',
                            'crawling' => 'Crawling',
                        ]),
                ]),
            )
                ->title(__('Base url to crawl'))
                ->description(__('Update url and it\'s status here'))
                ->commands([
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('saveBaseUrl')
                        ->canSee(!$this->baseUrl->exists),
                    Button::make(__('Update'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('saveBaseUrl')
                        ->canSee($this->baseUrl->exists),
                ]),
        ];
    }

    public function saveBaseUrl(Request $request, BaseUrl $baseUrl)
    {
        $request->validate([
            'baseUrl.url' => 'required' . ($baseUrl->exists ? '' : '|unique:base_urls,url'),
            'baseUrl.status' => 'required',
        ]);

        $baseUrl->fill($request->get('baseUrl'))->save();

        Alert::info('You have successfully updated the base url.');

        return redirect()->route('platform.systems.base_urls');
    }
}
