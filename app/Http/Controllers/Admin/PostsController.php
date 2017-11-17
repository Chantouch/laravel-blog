<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostsRequest;
use App\Media;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class PostsController extends Controller
{
    /**
     * Show the application posts index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::withCount('comments')->with('author')->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'users' => User::authors()->pluck('name', 'id'),
            'categories' => Category::select('name', 'id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.posts.create', [
            'users' => User::authors()->pluck('name', 'id'),
            'categories' => Category::select('id', 'name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostsRequest $request
     */
    public function store(PostsRequest $request)
    {
        $data = $request->all();
        $storage_path = storage_path("app/public/uploads/media/");
        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0777, true);
        }
        $request->merge(['content' => clean($request->get('content'))]);
        $dom = new DOMDocument();
        $dom->formatOutput = true;
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($data['content'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submitted message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid() . str_random(10);
                $filename_mime = $filename . '.' . $mimetype;
                $filepath = "/media/$filename_mime";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)// resize if required	/* ->resize(300, 200) */
                ->encode($mimetype, 100)// encode file to the specified mimetype
                ->save($storage_path . $filename_mime);
                $medialibrary = new Media();
                $medialibrary->storeMediaLibraryByPost($filename_mime, $mimetype, $filename_mime);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif -->
        } // <!--Check-->
        libxml_clear_errors();
        //<!--Save the description content to db-->
        $data['content'] = clean($dom->saveHTML());
        switch ($request->submit) {
            case 'Save':
                $data['active'] = 1;
                break;
            case 'Draft':
                $data['active'] = 0;
        }
        $post = Post::with('author')->create($data);
        if ($request->has('source_title') && $request->has('source_url')) {
            $source = new Source();
            $source->title = $request->source_title;
            $source->url = $request->source_url;
            $source->translator = $request->source_translator;
            $source->post_id = $post->id;
            $source->save();
        }
        if ($request->has('categories')) {
            $post->categories()->attach(explode(',', $request->categories));
        }
        if ($request->has('tags')) {
            $post->tags()->attach(explode(',', $request->tags));
        }
        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.created'));
    }

    /**
     * Update the specified resource in storage.
     * @param PostsRequest $request
     * @param Post $post
     * @return
     */
    public function update(PostsRequest $request, Post $post)
    {
        $data = $request->all();
        $storage_path = storage_path("app/public/uploads/media/");
        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0777, true);
        }
        $request->merge(['content' => clean($request->get('content'))]);
        $dom = new DOMDocument();
        $dom->formatOutput = true;
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($data['content'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // foreach <img> in the submitted message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid() . str_random(10);
                $filename_mime = $filename . '.' . $mimetype;
                $filepath = "/media/$filename_mime";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)// resize if required	/* ->resize(300, 200) */
                ->encode($mimetype, 100)// encode file to the specified mimetype
                ->save($storage_path . $filename_mime);
                $medialibrary = new Media();
                $medialibrary->storeMediaLibraryByPost($filename_mime, $mimetype, $filename_mime);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif -->
        } // <!--Check-->
        libxml_clear_errors();
        //<!--Save the description content to db-->
        $data['content'] = clean($dom->saveHTML());
        if ($request->has('categories')) {
            $post->categories()->sync(explode(',', $request->categories));
        } else {
            $post->categories()->sync(array());
        }
        if ($request->has('tags')) {
            $post->tags()->sync(explode(',', $request->tags));
        } else {
            $post->tags()->sync(array());
        }
        if (!empty($post->source)) {
            $array_source = [
                'title' => $request->source_title,
                'url' => $request->source_url,
                'translator' => $request->source_translator
            ];
            $post->source()->update($array_source);
        } else {
            if ($request->has('source_title') && $request->has('source_url')) {
                $source = new Source();
                $source->title = $request->source_title;
                $source->url = $request->source_url;
                $source->translator = $request->source_translator;
                $source->post_id = $post->id;
                $source->save();
            }
        }
        switch ($request->submit) {
            case 'Update':
                $data['active'] = 1;
                break;
            case 'Draft':
                $data['active'] = 0;
        }
        $post->update($data);

        if ($request->hasFile('thumbnail')) {
            $post->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess(__('posts.deleted'));
    }
}
