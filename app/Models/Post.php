<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'user_id',
        'photo'
    ];

    public function user(){
        //devolveme el usuario que creo esta publicacion
        return $this->belongsTo(User::class);
    }

    public function category(){
        //devolveme la categoria de esta publicacion
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        //devolveme todos los comentarios de esta publicacion
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()//id->slug
    {
        return 'slug';
    }

    public function scopeLatest($query){
        //query que yo te mande el resultado 
        //ordenalo de manera decendente
        return $query->orderBy('created_at','DESC');
    }
}
