<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use App\Models\Category;
use App\Models\Tag;
use App\Comment;
use App\NewsletterSubscription;
use Faker\Factory;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20)
            ->create()
            ->each(function ($post) {
                factory(Comment::class, 5)
                    ->create([
                        'post_id' => $post->id
                    ]);
            });

        factory(NewsletterSubscription::class, 5)->create();
    }
}
