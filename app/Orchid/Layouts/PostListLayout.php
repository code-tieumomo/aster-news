<?php

namespace App\Orchid\Layouts;

use App\Models\Category;
use App\Models\Post;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('image', __('Image'))
                ->render(function (Post $post) {
                    return "<img src='{$post->image}' width='80' height='45' style='object-fit: cover; border-radius: 5px'>";
                }),

            TD::make('title', __('Title'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Post $post) => Link::make($post->title)
                    ->route('platform.systems.posts.edit', $post->id)),

            TD::make('slug', __('Slug'))
                ->sort()
                ->filter(Input::make()),

            TD::make('category_id', __('Category'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Post $post) => Link::make($post->category->name)
                    ->route('platform.systems.categories.edit', $post->category->id)),

            TD::make('user_id', __('Author'))
                ->sort()
                ->filter(Input::make())
                ->render(fn (Post $post) => Link::make($post->user->name)
                    ->route('platform.systems.users.edit', $post->user->id)),

            TD::make('created_at', __('Created'))
                ->sort()
                ->render(fn (Post $post) => $post->created_at->toDateTimeString()),

            TD::make('is_published', __('Published'))
                ->sort()
                ->cantHide()
                ->filter(TD::FILTER_SELECT, [
                    0 => 'No',
                    1 => 'Yes',
                ])
                ->render(fn (Post $post) => $post->is_published ? 'Yes' : 'No'),
        ];
    }
}
