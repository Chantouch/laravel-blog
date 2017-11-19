<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Torann\LaravelMetaTags\Facades\MetaTag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::withCount('posts')->latest()->paginate($request->input('limit', 20));
        return view('tags.index',[
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $tag = Tag::findBySlugOrFail($id);
        $tag->count_post = $tag->posts()->count();

        MetaTag::set('title', $tag->name);
        MetaTag::set('description', strip_tags($tag->description));
        MetaTag::set('image', asset($tag->hasThumbnail() ? $tag->thumbnail()->url : 'storage/images/default-share-image.png'));

        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->latest()->paginate($request->input('limit', 20))
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
