<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * @param  String $medium
     * @return Response
     */
    public function shows(String $medium)
    {
        $media = Media::where('filename', $medium)->firstOrFail();

        $headers = [
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => "filename='{$media->original_filename}'"
        ];

        return response()->file($media->getPath(), $headers);
    }

    /**
     * @param String $medium
     * @return mixed
     */
    function show(String $medium)
    {

        $path = 'public/uploads/media/';

        $media = Media::where('filename', $medium)->firstOrFail();

        $filecontent = Storage::disk('ftp')->get($path . $media->filename);

        return Response::make($filecontent, '200', array(
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => "filename='{$media->original_filename}'"
        ));
    }
}
