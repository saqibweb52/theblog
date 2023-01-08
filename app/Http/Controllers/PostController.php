<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('isAdmin', Post::class);
       
    
        $user = $request->user();
        $post = new Post;
        
        $post->title = $request->title;
        $post->body = $request->body;

        $user->post()->save($post);

        return redirect(Route('create_post'))->with('posted','Post Published');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('isAdmin', Post::class);

        $post = Post::find($id);
     
    
        return view('editpost',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin', Post::class);
        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;
        
        $post->save();

        return redirect(Route('dashboard'))->with('posted','Post Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('isAdmin', Post::class);
     Post::destroy($id);
     return redirect(Route('dashboard'))->with('posted','Post Deleted');
    }

    public function show_post(){
     
        $posts = Post::all();
      
        return view('dashboard',['posts'=>$posts]);

    }
}
