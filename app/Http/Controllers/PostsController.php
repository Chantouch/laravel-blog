<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Torann\LaravelMetaTags\Facades\MetaTag;

class PostsController extends BaseController
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count_posts = Post::search($request->input('q'))->count();
        $posts = Post::search($request->input('q'))
            ->with('author', 'media')
            ->withCount('comments')
            ->latest()
            ->paginate($request->input('limit', '20'));
        $posts->appends(['q' => $request->input('q')]);
        return view('posts.index', [
            'posts' => $posts,
            'count_posts' => $count_posts
        ]);
    }

    /**
     * Display the specified resource.
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Post $post)
    {
        MetaTag::set('title', $post->title);
        MetaTag::set('description', strip_tags($post->content));
        MetaTag::set('image', asset($post->hasThumbnail() ? $post->thumbnail()->url : 'storage/images/default-share-image.png'));
        $post->comments_count = $post->comments()->count();
        $post->increment('view_count');
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
