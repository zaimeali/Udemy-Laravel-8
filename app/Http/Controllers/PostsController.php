<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\BlogPost;

class PostsController extends Controller
{

    // private $posts = [
    //     1 => [
    //         'title' => 'Intro to Laravel',
    //         'has_comments' => false,
    //         'is_new' => true,
    //         'author' => 'zaime',
    //         'content' => 'Short Intro to laravel',
    //     ],
    //     2 => [
    //         'title' => 'Intro to PHP',
    //         'has_comments' => true,
    //         'is_new' => false,
    //         'author' => null,
    //         'content' => 'Short Intro to PHP',
    //     ],
    //     3 => [
    //         'title' => 'Intro to Blade',
    //         'has_comments' => true,
    //         'is_new' => false,
    //         'author' => 'zaime',
    //         'content' => 'Short Intro to Blade',
    //     ],
    // ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('posts.index', ['posts' => $this->posts]);
        return view('posts.index', ['posts' => BlogPost::all()]);
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
        // dump($request->input());
        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);
        // return view('posts.show', ['post' => $this->posts[$id]]);
        // $post = BlogPost::findOrFail($id);
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
