<?php

namespace App;

use App\Concern\Mediable;
use App\Models\Like;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;
    use Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'registered_at',
        'api_token', 'username', 'access_token', 'avatar',
        'verified', 'verification_token', 'thumbnail_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'registered_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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

        return 'username';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'username' => [
                'source' => 'name',
                'separator' => ''
            ]
        ];
    }

    /**
     * Get the user's fullname titleized.
     *
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return title_case($this->name);
    }

    /**
     * Encrypt the user's password.
     *
     * @param $password
     * @return void
     * @internal param string $passwword
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Scope a query to only include users registered last week.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('registered_at', [Carbon::now()->subWeek(), Carbon::now()])
            ->latest();
    }

    /**
     * Scope a query to order users by latest registered.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('registered_at', 'desc');
    }

    /**
     * Scope a query to filter available author users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuthors($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('roles.name', Role::ROLE_ADMIN)
                ->orWhere('roles.name', Role::ROLE_EDITOR);
        });
    }

    /**
     * Check if the user can be an author
     *
     * @return boolean
     */
    public function canBeAuthor(): bool
    {
        return $this->isAdmin() || $this->isEditor();
    }

    /**
     * Check if the user has a role
     *
     * @param string $role
     * @return boolean
     */
    public function hasRole($role): bool
    {
        return $this->roles->where('name', $role)->isNotEmpty();
    }

    /**
     * Check if the user has role admin
     *
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    /**
     * Check if the user has role editor
     *
     * @return boolean
     */
    public function isEditor(): bool
    {
        return $this->hasRole(Role::ROLE_EDITOR);
    }

    /**
     * Return the user's posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Return the user's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /**
     * Return the user's likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class, 'author_id');
    }

    /**
     * Return the user's roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
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

            if (Storage::disk(config('filesystem.default'))->exists($path . $name)) {
                Storage::disk(config('filesystem.default'))->delete($path . $name);
            }
            $this->thumbnail()->update($array_data);
        }
    }
}