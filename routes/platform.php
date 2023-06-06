<?php

declare(strict_types=1);

use App\Orchid\Screens\CategoryEditScreen;
use App\Orchid\Screens\CategoryListScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/form/examples/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/form/examples/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/form/examples/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/form/examples/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/layout/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/charts/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/cards/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');

// Custom
Route::screen('categories/{category}/edit', CategoryEditScreen::class)
    ->name('platform.systems.categories.edit')
    ->breadcrumbs(fn (Trail $trail, $category) => $trail
        ->parent('platform.systems.categories')
        ->push($category->name, route('platform.systems.categories.edit', $category)));

Route::screen('categories/create', CategoryEditScreen::class)
    ->name('platform.systems.categories.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.categories')
        ->push(__('Create'), route('platform.systems.categories.create')));

Route::screen('categories', CategoryListScreen::class)
    ->name('platform.systems.categories')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Categories'), route('platform.systems.categories')));

Route::screen('posts', \App\Orchid\Screens\PostListScreen::class)
    ->name('platform.systems.posts')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Posts'), route('platform.systems.posts')));

Route::screen('posts/create', \App\Orchid\Screens\PostEditScreen::class)
    ->name('platform.systems.posts.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.posts')
        ->push(__('Create'), route('platform.systems.posts.create')));

Route::screen('posts/{post}/edit', \App\Orchid\Screens\PostEditScreen::class)
    ->name('platform.systems.posts.edit')
    ->breadcrumbs(fn (Trail $trail, $post) => $trail
        ->parent('platform.systems.posts')
        ->push($post->title, route('platform.systems.posts.edit', $post)));

// Route::screen('crawl', \App\Orchid\Screens\CrawlScreen::class)
//     ->name('platform.systems.crawl')
//     ->breadcrumbs(fn (Trail $trail) => $trail
//         ->parent('platform.index')
//         ->push(__('Posts'), route('platform.systems.crawl')));

// Base urls
Route::screen('base-urls', \App\Orchid\Screens\BaseUrl\BaseUrlListScreen::class)
    ->name('platform.systems.base_urls')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Base Urls'), route('platform.systems.base_urls')));

Route::screen('base-urls/create', \App\Orchid\Screens\BaseUrl\BaseUrlEditScreen::class)
    ->name('platform.systems.base_urls.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.base_urls')
        ->push(__('Create'), route('platform.systems.base_urls.create')));

Route::screen('base-urls/{baseUrl}/edit', \App\Orchid\Screens\BaseUrl\BaseUrlEditScreen::class)
    ->name('platform.systems.base_urls.edit')
    ->breadcrumbs(fn (Trail $trail, $baseUrl) => $trail
        ->parent('platform.systems.base_urls')
        ->push($baseUrl->url, route('platform.systems.base_urls.edit', $baseUrl)));
