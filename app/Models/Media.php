<?php

namespace App;

use App\Concern\Mediable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class Media extends Model
{

    use Mediable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename',
        'original_filename',
        'mime_type',
        'mediable_id',
        'mediable_type'
    ];

    /**
     * Get the media's url.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('media.show', ['medium' => $this->filename]);
    }

    /**
     * Get the media's storage path.
     *
     * @return string
     */
    public function getPath(): string
    {
        return storage_path('public/uploads/media/') . $this->filename;
    }

    /**
     * Store and set the post's thumbnail
     *
     * @param UploadedFile $thumbnail
     * @return void
     */
    public function storeAndSetThumbnail(UploadedFile $thumbnail)
    {
        $thumbnail_name = $thumbnail->store('public/uploads/media');
        $this->media()->create([
            'filename' => str_replace('public/uploads/media/', '', $thumbnail_name),
            'original_filename' => $thumbnail->getClientOriginalName(),
            'mime_type' => $thumbnail->getMimeType()
        ]);
    }

    /**
     * Store and set the media library
     *
     * @param $filename
     * @param $mimetype
     * @param $originalname
     * @return $this
     */
    public function storeMediaLibraryByPost($filename, $mimetype, $originalname = null)
    {
        $this->media()->create([
            'filename'          => $filename,
            'original_filename' => $originalname,
            'mime_type'         => $mimetype,
        ]);
        return $this;
    }
}
