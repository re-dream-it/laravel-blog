<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $guarded = [0 => 'id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function scopePublished($query){
        return $query->where('is_published', 1);
    }

    public function isLikedBy($user_id){
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}
