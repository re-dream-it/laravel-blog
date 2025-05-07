<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $posts = Post::factory(1)->create();
        $tags = Tag::all('id')->pluck('id');

        foreach ($posts as $post){
            $tagsIds = $tags->random(2);
            $post->tags()->attach($tagsIds);
        }

    }
}
