<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //(count($posts));
        if (count($posts) != 0) {
            return view('index')->with('posts' , $posts);
        }else{
            return view('index')->with('posts' , $posts);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
		'title' => 'required' , 
		'content' => 'required'
		]);
		$post = new \App\Models\Post();
		$post->title = $request->input('title');
		$post->body = $request->input('content');
		$post->user_id = \Auth::id();
		$post->save();
		return redirect('/' )->with('success' , "Post created successfully!");
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
	   $post = Post::find($id);
	   return view('post.edit')->with('post' , $post);
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
        $this->validate($request , [
		'title' => 'required' , 
		'content' => 'required'
	]);
	$post = Post::find($id);
	if($post->user_id != \Auth::id()){
		return redirect('/')->withErrors(['Not allowed' => 'Requested action is not allowed.']);
	}
		$post->title = $request->input('title');
		$post->body = $request->input('content');
		$post->save();
		return redirect('/' )->with('success' , "Post edited successfully!");
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$post = Post::find($id);
	if($post->user_id != \Auth::id()){
		return redirect('/')->withErrors(['Not allowed' => 'Requested action is not allowed.']);
	}
	$post->delete();
	return redirect('/' )->with('success' , "Post deleted successfully!");

    }
}
