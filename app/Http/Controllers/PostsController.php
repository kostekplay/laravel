<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    // private $posts = [
    //     1 => [
    //         'title' => 'Intro Laravel',
    //         'content' => 'Content Laravel',
    //         'is_new' => true,
    //         'has_comment' => true,
    //     ],
    //     2 => [
    //         'title' => 'Intro PHP',
    //         'content' => 'Content PHP',
    //         'is_new' => false,
    //     ],
    //     3 => [
    //         'title' => 'Intro Unity',
    //         'content' => 'Content Unity',
    //         'is_new' => true,
    //         'has_comment' => true,
    //     ],
    // ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['post' => BlogPost::orderBy('created_at','desc')->take(5)->get()]);
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
        //dd($request);
        $post = new BlogPost();
        $post->title = $request->input(('title'));
        $post->content = $request->input(('content'));
        $post->save();

        return redirect()->route('posts.show', ['post'=> $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //abort_if(!isset($this->posts[$id]), 404);
        //return view('posts.show', ['post' => $this->posts[$id]]);
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
