<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    
    /**
     * @var Post
     */
    public $post;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Post $post): iterable
    {
        return [
            'post' => $post,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->post->exists ? 'Edit post' : 'Creating a new post';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Blog post editor";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create post')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->post->exists),
            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->post->exists),
            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->post->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        $layout = [
            Input::make('post.title')
                ->title('Title')
                ->placeholder('Attractive but mysterious title')
                ->help('Specify a short descriptive title for this post.'),

            Input::make('post.slug')
                ->title('Slug')
                ->placeholder('Slug to post'),

            Picture::make('post.image')
                ->title('Image')
                ->width(1000)
                ->height(500),

            Relation::make('post.user_id')
                ->title('Author')
                ->placeholder('Select author')
                ->fromModel(User::class, 'name'),

            Relation::make('post.category_id')
                ->title('Category')
                ->placeholder('Select category')
                ->fromModel(Category::class, 'name'),

            Quill::make('post.content')
                ->placeholder('Write something amazing...')
                ->title('Main text'),

        ];

        if (Auth::user()->inRole('writer')) {
            unset($layout[3]);
        }

        return [
            Layout::rows($layout),
        ];
    }

    public function print(): void
    {
        Toast::warning('Hello, world! This is a toast message.');
    }

    /**
     * @param Post $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(\Illuminate\Http\Request $request, Post $post)
    {
        $request->validate([
            'post.title' => 'required|string',
            'post.slug' => 'required|string',
            // 'post.user_id' => 'required|exists:users,id',
            'post.category_id' => 'required|exists:categories,id',
            'post.content' => 'required|string',
        ]);

        $post->fill($request->get('post'));
        if ($post->user_id == null) {
            $post->user_id = Auth::user()->id;
        }
        $post->save();

        Alert::info('You have successfully created a post.');

        return redirect()->route('platform.systems.posts');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Post $post)
    {
        $post->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.systems.posts');
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.posts',
        ];
    }
}
