<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\User;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Authentication
 */
// Basic authentication with Breeze
require __DIR__ . '/auth.php';
// Social login with Socialite
Route::get('/auth/redirect/{provider}', [\App\Http\Controllers\Auth\SocialLoginController::class, 'redirectToProvider'])->name('socialite.redirect');
Route::get('/auth/callback/{provider}', [\App\Http\Controllers\Auth\SocialLoginController::class, 'handleProviderCallback'])->name('socialite.callback');

/**
 * Client
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/post/{post?}', [\App\Http\Controllers\HomeController::class, 'detailTest'])->name('home.detail-test');
Route::get('/cate/{cate}', [\App\Http\Controllers\HomeController::class, 'postsByCate'])->name('home.posts-by-cate');
Route::get('/search', [\App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'is-admin'])->name('dashboard');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function (\ElasticAdapter\Documents\DocumentManager $documentManager) {
    // dd(SimpleRake::extractKeywords('OK'));

    // dd(SimpleRake::extractKeywords('OK'));

    // $postProcessor = new \App\Services\PostProcessor(new \Symfony\Component\DomCrawler\Crawler());
    // dd($postProcessor->process(1));

    // $res = \Cloudinary::upload(
    //     'https://i1-suckhoe.vnecdn.net/2023/06/01/close-up-mosquito-sucking-bloo-9683-3804-1685595399.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=aMzQaYWFc-jeyOeBuQmL1g',
    //     [
    //         'folder' => 'posts',
    //         'public_id' => 'test',
    //         'overwrite' => true,
    //         'resource_type' => 'image',
    //         'format' => 'jpg',
    //     ]
    // );
    // dd($res->getSecurePath());

    // \App\Jobs\TestJob::dispatch();

    // $file = escapeshellarg(storage_path("logs/process_post.log"));
    // $line = `tail -n 30 $file`;
    // dd($line);

    // $parser = new \Devdot\Monolog\Parser(storage_path('logs/process_post.log'));
    // $records = $parser->get();
    // foreach ($records as $record) {
    //     printf("Logged %s at %s with message: %s<br>",
    //         $record->level,
    //         $record->datetime->format('Y-m-d H:i:s'),
    //         $record->message,
    //     );
    // }

    // dd(htmlspecialchars_decode('https://i1-suckhoe.vnecdn.net/2023/05/21/old-japanese-eating-1562-16841-8621-7881-1684637753.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=V1Q1sDd_n2ynTB8SutAraw'));

    // $computer = app('Computer');
    // dd($computer);

    // $post = new Post;
    // $post->title = 'test';
    // $post->slug = 'test';
    // $post->content = 'test';
    // $post->category_id = 111;
    // $post->user_id = 2;
    // $post->save();

    // $posts = Post::search('một triệu người')->raw();
    // dd($posts);

    // $client = \Elasticsearch\ClientBuilder::create()
    //     ->setHosts(['127.0.0.1:9200'])
    //     ->build();
    //
    // $params = [
    //     'index' => 'posts',
    //     'body' => [
    //         'query' => [
    //             'query_string' => [
    //                 'query' => 'title:(nhiều OR nhất OR thế OR giới)',
    //                 'fields' => ['title', 'description', 'content'],
    //             ],
    //         ],
    //     ],
    //     'size' => 10,
    // ];
    //
    // $response = $client->search($params);
    // dd($response);
    Post::all()->each(function ($post) {
        \App\Jobs\ProcessPost::dispatch($post->id)->onQueue('process_post');
    });
})->name('test');
