<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    /**
     * Listen to the Post saving event.
     *
     * @param  Post $post
     * @return void
     */
    public function saving(Post $post)
    {
        $post->slug = str_slug($post->title, '-');
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \App\Post $post
     * @return void
     */
    public function deleting(Post $post)
    {
        $post->source()->delete();
        $post->categories()->detach();
        $post->tags()->detach();
    }
}
