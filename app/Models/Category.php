<?php

namespace App\Models;

use App\Concern\Mediable;
use App\Post;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use Mediable;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $fillable = [
        'name', 'description', 'active', 'media_id', 'slug'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        if (request()->expectsJson()) {
            return 'id';
        }

        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id')->withPivot('category_id', 'post_id')->latest()->withTimestamps();
    }

    /**
     * @return bool
     */
    public function hasPost(): bool
    {
        return $this->posts()->count();
    }
}
