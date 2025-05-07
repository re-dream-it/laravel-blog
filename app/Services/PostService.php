<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\HandlesImages;
use Illuminate\Support\Facades\DB;

class PostService
{
    use HandlesImages;


    public function createPost(array $data): Post {
        $tags = $data['tags'] ?? null;
        unset($data['tags']);

        return DB::transaction(function() use ($data, $tags) {
            $data['image'] = $this->uploadImage($data['image']);
            $post = Post::Create($data);
            $post->tags()->sync($tags);

            return $post;
        });
    }

    public function updatePost(Post $post, array $data): Post {
        $tags = $data['tags'] ?? null;
        unset($data['tags']);

        return DB::transaction(function() use ($post, $data, $tags) {
            if ($data['image'] ?? false) {
                if ($post->image) $this->deleteImage($post->image);
                $data['image'] = $this->uploadImage($data['image']);
            } 
            else unset($data['image']); 
            
            $post->update($data);
            $post->tags()->sync($tags);

            return $post;
        });
    }
}