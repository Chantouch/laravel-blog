<?php

namespace App\Http\Controllers\Admin;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FroalaEditor_Image;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{

    public $view = 'admin.medias.';
    public $route = 'admin.medias.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = FroalaEditor_Image::getList('/storage/uploads/media/');
            return stripslashes(json_encode($response));
        } catch (Exception $e) {
            return http_response_code(404);
        }
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
        try {
            $fileData = $request->file('image'); //this gets the image data for 1st argument
            $filename = $fileData->store('public/uploads/media');
            $destinationPath = 'storage/uploads/media/';
            $media = new Media();
            $media->filename = str_replace('public/uploads/media/', '', $filename);
            $media->original_filename = $fileData->getClientOriginalName();
            $media->mime_type = $fileData->getMimeType();
            $media->mediable_type = 'App\Media';
            $media->save();
            $fileData->move($destinationPath, str_replace('public/uploads/media/', '', $filename));
            $completePath = url('/' . $destinationPath . str_replace('public/uploads/media/', '', $filename));
        } catch (Exception $exception) {
            return http_response_code(404);
        }
        return response()->json(['link' => $completePath]);

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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $input = $request->all();
            $url = parse_url($input['src']);
            $splitPath = explode("/", $url["path"]);
            $splitPathLength = count($splitPath);
            $filename = $splitPath[$splitPathLength - 1];
            if (File::exists(storage_path('app/public/uploads/media'))) {
                Storage::delete('public/uploads/media/' . $filename);
                Media::where('filename', $filename)->delete();
            }
        } catch (Exception $exception) {
            return http_response_code(404);
        }
        return response()->json('Image deleted!');
    }
}
