<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Media;
use App\Models\Tag;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class TagController extends Controller
{
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $view = 'admin.tags.';
    protected $route = 'admin.tags.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view . 'index', [
            'tags' => Tag::latest()->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $data = $request->all();
        $storage_path = storage_path("app/public/uploads/media/");
        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0777, true);
        }
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($data['description'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                ->encode($mimetype, 100);// encode file to the specified mimetype
                //->save($storage_path . $filename_mime);
                Storage::put('public/uploads/media/'.$filename_mime, $image->__toString());
                $medialibrary = new Media();
                $medialibrary->storeMediaLibraryByPost($filename_mime, $mimetype, $filename_mime);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif -->
        } // <!--Check-->
        libxml_clear_errors();
        //<!--Save the description description to db-->
        $data['description'] = $dom->saveHTML();
        $tag = Tag::create($data);

        if ($request->hasFile('thumbnail')) {
            $tag->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.tags.edit', $tag)->withSuccess(__('tags.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view($this->view . 'show', [
            'tag' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view($this->view . 'edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();
        $storage_path = storage_path("app/public/uploads/media/");
        if (!file_exists($storage_path)) {
            mkdir($storage_path, 0777, true);
        }
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($data['description'], 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                ->encode($mimetype, 100);// encode file to the specified mimetype
                //->save($storage_path . $filename_mime);
                Storage::put('public/uploads/media/'.$filename_mime, $image->__toString());
                $medialibrary = new Media();
                $medialibrary->storeMediaLibraryByPost($filename_mime, $mimetype, $filename_mime);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif -->
        } // <!--Check-->
        libxml_clear_errors();
        //<!--Save the description description to db-->
        $data['description'] = $dom->saveHTML();
        $tag->update($data);

        if ($request->hasFile('thumbnail')) {
            $tag->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.tags.edit', $tag)->withSuccess(__('tags.updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->withSuccess(__('tags.deleted'));
    }
}
