<?php

namespace App\Http\Controllers;

use Request;

use App\Post;
use App\User;
use Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // print_r(app('request')->route()->getAction());
        // exit;
        // $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(2);
        return view('posts.index')->with('posts',$posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'tag' => request('tag'),
            'user_id' => auth()->id()
        ]);
        return redirect('/posts')->with('success','Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        // echo "<pre>";
        // print_r($post); die();
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(Auth::user()->isAdmin()){
            return view('posts.edit')->with('post',$post);
        }
        elseif(auth()->user()->id == $post->user_id){
            return view('posts.edit')->with('post',$post);
        }
        else{
            return redirect('/posts')->with('error','Sorry!!! You cannot EDIT other users blog post.');
        }    
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
        $post=Post::find($id);
        $input=Request::all();
        $post->update($input);
        return redirect('/posts')->with('success','Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(Auth::user()->isAdmin()){
            $post->delete();
            return redirect('/posts')->with('error','Post Deleted!!!');
        }
        else{
            return redirect('/posts')->with('error','Sorry!!! You cannot DELETE blog post.');
        }
    }

}
