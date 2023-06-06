<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            // Menu::make('Get Started')
            //     ->icon('bs.book')
            //     ->title('Navigation')
            //     ->route(config('platform.index')),
            //
            // Menu::make('Example Screen')
            //     ->icon('bs.collection')
            //     ->route('platform.example')
            //     ->badge(fn() => 6),
            //
            // Menu::make('Form Elements')
            //     ->icon('bs.journal')
            //     ->route('platform.example.fields')
            //     ->active('*/form/examples/*'),
            //
            // Menu::make('Overview Layouts')
            //     ->icon('bs.columns-gap')
            //     ->route('platform.example.layouts')
            //     ->active('*/layout/examples/*'),
            //
            // Menu::make('Charts')
            //     ->icon('bs.bar-chart')
            //     ->route('platform.example.charts'),
            //
            // Menu::make('Cards')
            //     ->icon('bs.card-text')
            //     ->route('platform.example.cards')
            //     ->divider(),

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            Menu::make(__('Crawl'))
                ->icon('bs.globe')
                ->route('platform.systems.base_urls')
                ->permission('platform.systems.crawl')
                ->title('Resources'),

            Menu::make(__('Categories'))
                ->icon('bs.box')
                ->route('platform.systems.categories')
                ->permission('platform.systems.categories'),

            Menu::make(__('Posts'))
                ->icon('bs.newspaper')
                ->route('platform.systems.posts')
                ->permission('platform.systems.posts')
                ->divider(),

            Menu::make('Home')
                ->title('Client')
                ->icon('bs.box-arrow-up-right')
                ->url('/')
                ->target('_self'),

        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.categories', __('Categories'))
                ->addPermission('platform.systems.posts', __('Posts'))
                ->addPermission('platform.systems.crawl', __('Crawl')),
        ];
    }
}
