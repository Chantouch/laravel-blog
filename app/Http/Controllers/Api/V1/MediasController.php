<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Admin\MediaRequest;
use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Media as MediaResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{
    /**
     * Return the medias.
     *
     * @param  Request $request
     * @param  Media $media
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request, Media $media)
    {
        return MediaResource::collection(
            $media->latest()->paginate($request->input('limit', 20))
        );
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
     * @param  MediaRequest $request
     * @return Media
     */
    public function store(MediaRequest $request)
    {
        //$this->authorize('store', Media::class);
        $media = new Media();
        if ($request->hasFile('file')) {
            $media->storeAndSetThumbnail($request->file('file'));
        }
        return $media;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('delete', $media);
        $media = Media::find($id);
        $name = $media->filename;
        if (File::exists(storage_path('app/public/uploads/media'))) {
            Storage::delete('public/uploads/media/' . $name);
        }
        $media->delete();
        return response()->json(['status' => 'Media deleted!']);
    }
}
