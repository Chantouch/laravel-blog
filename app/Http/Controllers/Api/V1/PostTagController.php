<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tag as TagResource;
use App\Post;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request, Post $post)
    {
        return TagResource::collection(
            $post->tags()->with('author')->latest()->paginate($request->input('limit', 20))
        );
    }
}
