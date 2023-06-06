<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $postsWithCate = Post::with('category')->published()->select('category_id')->distinct()->get();
        $categories = $postsWithCate->map(function ($item) {
            return $item->category;
        });

        $posts = Post::with('user')->published()->latest()->paginate(15);

        return view('home', compact(
            'categories', 'posts'
        ));
    }

    public function detailTest(Request $request, Post $post = null)
    {
        if (is_null($post)) $post = Post::first();

        return view('detail', compact('post'));
    }

    public function postsByCate(Request $request, string $cate)
    {
        $cate = Category::where('slug', $cate)->first();
        if (!$cate) abort(404);

        $posts = Post::with('user')->published()->where('category_id', $cate->id)->orderByDesc('created_at')->paginate(14);

        return view('posts-by-cate', compact(
            'posts', 'cate'
        ));
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $page = $request->page ?? 1;

        $client = \Elasticsearch\ClientBuilder::create()
            ->setHosts(['127.0.0.1:9200'])
            ->build();
        $params = [
            'index' => 'posts',
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            [
                                'query_string' => [
                                    'query' => $search,
                                    'fields' => ['description', 'content'],
                                    'boost' => 0.5,
                                ],
                            ],
                            [
                                'term' => [
                                    'title' => [
                                        'value' => $search,
                                        'boost' => 1.0,
                                    ],
                                ],
                            ],
                        ],
                        'minimum_should_match' => 1,
                    ],
                ],
            ],
            'size' => 100,
            // 'from' => ($page - 1) * 10,
        ];
        $response = $client->search($params);
        $ids = array_map(function ($item) {
            return $item['_id'];
        }, $response['hits']['hits']);
        if (count($response['hits']['hits']) > 0) {
            $posts = Post::whereIn('id', $ids)->orderByRaw('FIELD(id, ' . implode(', ', $ids) . ')')->paginate(10);
        } else {
            $posts = null;
        }

        // $posts = Post::search($search)->paginate(14);
        $cate = (object) [];
        $cate->name = 'Search result for: "' . $search . '"';

        return view('posts-by-cate', compact(
            'posts', 'cate'
        ));
    }
}
