<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts(){
        //devolveme todas las publicaciones con esta categoria
        return $this->hasMany(Post::class);
    }

    public function getRouterKeyName(){//id->slug
        return 'slug';
    }
}
