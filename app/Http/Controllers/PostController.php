<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
///
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
        $posts = Post::latest()->paginate(15);
        foreach($posts as $post){//8
            $post->setAttribute('user',$post->user);
            $post->setAttribute('added',Carbon::parse($post->created_at)->diffForHumans());
            $post->setAttribute('path',$post->slug);
        }
        return response()->json($posts);
    }

    public function todas_las_publicaciones_para_home(){
        Carbon::setlocale('es');
        $posts = Post::latest()->paginate(15);
        foreach($posts as $post){//8
            $post->setAttribute('user',$post->user);
            $post->setAttribute('added',Carbon::parse($post->created_at)->diffForHumans());
            $post->setAttribute('path',$post->slug);
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
        if($request['file']){
            $imageName = time().'.'.$request['file']->getClientOriginalExtension();
            $fileName = time().'.'.$request['file']->getClientOriginalExtension();
            //dd($imageName);
            $data = json_decode($request['form']);
            //dd($data['body']);
            //dd($data->title);
            Post::create([
                'title' => $data->title,
                'slug' => Str::slug($data->title),
                'body' => $data->body,
                'category_id' => $data->category,
                'user_id' => Auth::user()->id,
                'photo' => '/uploads/'.$imageName, 
                'file' =>'/archivos/' .$fileName
            ]);
            $request['file']->move(public_path('uploads'),$imageName);
            
            $request['file']->move(public_path('archivos'),$fileName);
    
            return response()->json(['state'=>'Exito de creacion de publicacion'], 200);
        }else{
            return response()->json(['state'=>'No existe imagen para la publicacion'], 404);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //dd('respondiendo la solicitud del detalle de la publicacion');
        Carbon::setlocale('es');
        return response()->json([
            'id'=>$post->id,
            'title'=>$post->title,
            'body'=>$post->body,
            'photo'=>$post->photo,
            'created_at'=>$post->created_at->diffForHumans(),    
            'user'=>$post->user->name,
            'category'=>$post->category->name,
            'categoryId'=>$post->category->id,
            'comments_count'=>$post->comments->count(),
            'comments'=> $this->allCommentsPost($post->comments)
        ]);
    }

    public function allCommentsPost($comments){
        $jsonComments = [];
        foreach($comments as $comment){
            array_push($jsonComments,[
                'id'=>$comment->id,
                'body'=>$comment->body,
                'created'=>$comment->created_at->diffForHumans(),
                'user'=>$comment->user->name,
            ]);
        }
        return $jsonComments;
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
        //dd('este es el metodo para actualizar por el modelo por defecto');
        //dd($request->all());///
        if(Auth::user()->id == $post->user_id){
            if($request['file']){
                $imageName = time().'.'.$request['file']->getClientOriginalExtension();
                $request['file']->move(public_path('uploads'),$imageName);
                $post->photo = '/uploads/'.$imageName;
            }else{
                $form = json_decode($request['form']);
                $post->title = $form->title;
                $post->slug = Str::slug($form->title);
                $post->category_id = $form->category;
                $post->body = $form->body;
            }
            $post->save();
            return response()->json(['state'=>'Editado con exito'], 200);
        }else{
            return response()->json(['state'=>'NO LE PERTENECE LA PUBLICACION'], 401);
        }

    }

    public function updateMyPost(Request $request){///updateblade
        //dd('aqui tambien voy a actualizar');
        //dd($request->all());
        //dd('este es mi propio metodo');
        $form = json_decode($request['form']);
        //dd($form);
        $post = Post::where('id',$form->idpost)->first();
        //dd($post);
        if(Auth::user()->id == $post->user_id){
            if($request['file']){
                $imageName = time().'.'.$request['file']->getClientOriginalExtension();
                $request['file']->move(public_path('uploads'),$imageName);
                $post->photo = '/uploads/'.$imageName;
            }else{
                $form = json_decode($request['form']);
                $post->title = $form->title;
                $post->slug = Str::slug($form->title);
                $post->category_id = $form->category;
                $post->body = $form->body;
            }
            $post->save();
            return response()->json(['state'=>'Editado con exito por mi propio metodo'], 200);
        }else{
            return response()->json(['state'=>'NO LE PERTENECE LA PUBLICACION'], 401);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //dd('aqui vamos a eliminar la publicacion');
        if(Auth::user()->id == $post->user_id){
            $post->delete();
            return response()->json(['state'=>'Eliminado con exito'], 200);
        }else{
            return response()->json(['state'=>'NO LE PERTENECE LA PUBLICACION'], 401);
        }
    }

    //TODAS LAS PUBLICACIONES DEL USUARIO LOGEADO
    public function allPostForUser(){
        Carbon::setlocale('es');
        $posts = Post::latest()->where('user_id',Auth::user()->id)->paginate(8);
        foreach($posts as $post){//8
            $post->setAttribute('user',$post->user);
            $post->setAttribute('added',Carbon::parse($post->created_at)->diffForHumans());
            $post->setAttribute('path','/post/'.$post->slug);
        }
        return response()->json($posts);
    }
}
