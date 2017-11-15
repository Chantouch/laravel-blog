<?php

namespace App\Models;

use App\Concern\Mediable;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Tag extends Model
{
    use Mediable;

    protected $fillable = [
        'name', 'description', 'active', 'media_id', 'slug'
    ];


    /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasThumbnail(): bool
    {
        return $this->hasMedia($this->media_id);
    }

    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->media->where('id', $this->media_id)->first();
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
        if (!$this->hasThumbnail()) {
            $media = $this->media()->create([
                'filename' => str_replace('public/uploads/media/', '', $thumbnail_name),
                'original_filename' => $thumbnail->getClientOriginalName(),
                'mime_type' => $thumbnail->getMimeType()
            ]);

            $this->update(['media_id' => $media->id]);
        } else {
            $name = $this->thumbnail()->filename;
            if (File::exists(storage_path('app/public/uploads/media'))) {
                Storage::delete('public/uploads/media/' . $name);
            }
            $this->thumbnail()->update([
                'filename' => str_replace('public/uploads/media/', '', $thumbnail_name),
                'original_filename' => $thumbnail->getClientOriginalName(),
                'mime_type' => $thumbnail->getMimeType()
            ]);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tag_post', 'tag_id', 'post_id')->withPivot('tag_id', 'post_id')->latest()->withTimestamps();
    }
}
