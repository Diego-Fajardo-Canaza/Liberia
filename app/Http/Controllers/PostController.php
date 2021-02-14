<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class PostController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setlocale('es');
        $posts = Post::latest()->paginate(8);
        foreach($posts as $post){
            $post->setAttribute('user', $post-> user);
            $post->setAttribute('added',Carbon::parse($post->created_at)-> diffForHumans());
            $post->setAttribute('path', '/post/'.$post-> slug);
            
        }
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request['file']->getClientOriginalExtension();
        //$request['file']->move(public_path('uploads'),$imageName); 
        //dd($imageName);
        $data= json_decode($request['form']);
        // dd($data['body']);
        //dd($data->category); 
        Post::create([
            'title' => $data->title,
            'slug' => Str::slug($data->body),
            'body' => $data->body,
            'category_id'=> $data->category,
            'user_id' => Auth::user()->id,  
            'photo' => '/uploads/'.$imageName 
        ]);            
        $request['file']->move(public_path('uploads'),$imageName);
        return response()->json(['state'=>'crecion correcta'],200);
    }
        
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
