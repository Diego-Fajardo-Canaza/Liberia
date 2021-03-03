<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'post_id',
        'user_id'
    ];
    public function user(){
        //devuelvas el usuario que realizo este comentario
        return $this->belongsTo(User::class);
    }
}
