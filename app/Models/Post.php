<?php

namespace App;

use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Concern\Mediable;
use App\Scopes\PostedScope;
use Carbon\Carbon;

class Post extends Model
{
    use Mediable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'content',
        'posted_at',
        'thumbnail_id',
        'slug',
        'view_count',
        'active'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PostedScope);
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
                'source' => 'title'
            ]
        ];
    }

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
     * Scope a query to search posts
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%{$search}%");
    }

    /**
     * Scope a query to order posts by latest posted
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('posted_at', 'desc');
    }

    /**
     * Scope a query to only include posts posted last month.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastMonth($query, $limit = 5)
    {
        return $query->whereBetween('posted_at', [Carbon::now()->subMonth(), Carbon::now()])
            ->latest()
            ->limit($limit);
    }

    /**
     * Scope a query to only include posts posted last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('posted_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->latest();
    }

    /**
     * Check if the post has a valid thumbnail
     *
     * @return boolean
     */
    public function hasThumbnail(): bool
    {
        return $this->hasMedia($this->thumbnail_id);
    }

    /**
     * Retrieve the post's thumbnail
     *
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->media->where('id', $this->thumbnail_id)->first();
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
        $array_data = [
            'filename' => str_replace('public/uploads/media/', '', $thumbnail_name),
            'original_filename' => $thumbnail->getClientOriginalName(),
            'mime_type' => $thumbnail->getMimeType()
        ];
        if (!$this->hasThumbnail()) {
            $media = $this->media()->create($array_data);

            $this->update(['thumbnail_id' => $media->id]);
        } else {
            $name = $this->thumbnail()->filename;

            $path = 'public/uploads/media/';

            if (Storage::disk('ftp')->exists($path . $name)) {
                Storage::disk('ftp')->delete($path . $name);
            }
            $this->thumbnail()->update($array_data);
        }
    }

    /**
     * Return the post's author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Return the post's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * return the excerpt of the post content
     *
     * @param  $length
     * @return string
     */
    public function excerpt($length = 150): string
    {
        return strip_tags(str_limit($this->content, $length));
    }

    /**
     * return the excerpt of the post content
     *
     * @param  $length
     * @return string
     */
    public function trimTitle($length = 30): string
    {
        return strip_tags(str_limit($this->title, $length));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id')->withPivot('post_id', 'category_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post', 'post_id', 'tag_id')->withPivot('post_id', 'tag_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function source()
    {
        return $this->hasOne(Source::class);
    }


}
