<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = Cache::remember('categories', 24 * 60, function () {
            return Category::all();
        });
        return response()->view('sitemap.index', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/html');
    }

    public function posts()
    {
        $posts = Post::with('categories')->get();
        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $categories = Category::all();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }
}
