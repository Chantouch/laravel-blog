<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

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
        return view('posts.index', [
            'posts' => Post::search($request->input('q'))
                ->with('author', 'media')
                ->withCount('comments')
                ->latest()
                ->paginate(20)
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
        $post->comments_count = $post->comments()->count();
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
