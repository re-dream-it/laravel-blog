<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HandlesImages
{
    public function uploadImage($image): string{
        return $image->store('images', 'public');
    }

    public function deleteImage($path){
        if ($path) {
            return Storage::delete($path);
        }
    }
}
