<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    //publicaciones
    //Route::get('/posts',[PostController::class,'index']);
    Route::apiResource('/posts',PostController::class);//create//show//update//destroy
    Route::get('/post/user-posts',[PostController::class,'allPostForUser']);
    Route::post('/post/update-my-post',[PostController::class,'updateMyPost']);
    ///categorias
    //Route::get('/categorys',[CategoryController::class,'index']);
    Route::apiResource('/categorys',CategoryController::class);
    ///comentarios
    Route::apiResource('/comments',CommentController::class);
});

Route::get('/todas-las-publicaciones',[PostController::class,'todas_las_publicaciones_para_home']);