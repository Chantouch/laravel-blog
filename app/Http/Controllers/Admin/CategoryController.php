<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    protected $view = 'admin.categories.';
    protected $route = 'admin.categories.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view . 'index', [
            'categories' => Category::latest()->paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     */
    public function store(CategoryRequest $request)
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
        $category = Category::create($data);

        if ($request->hasFile('thumbnail')) {
            $category->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.categories.edit', $category)->withSuccess(__('categories.created'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view($this->view . 'show', [
            'categories' => Category::pluck('name', 'id'),
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view($this->view . 'edit', [
            'category' => $category,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryRequest $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
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
        $category->update($data);

        if ($request->hasFile('thumbnail')) {
            $category->storeAndSetThumbnail($request->file('thumbnail'));
        }

        return redirect()->route('admin.categories.edit', $category)->withSuccess(__('categories.updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
