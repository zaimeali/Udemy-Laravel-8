<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Requests
use App\Http\Requests\StorePost;

// Models
use App\Models\BlogPost;

// DB
use Illuminate\Support\Facades\DB;


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
        // DB::connection()->enableQueryLog();
        // $posts = BlogPost::with('comments')->get();
        // dd(DB::getQueryLog());


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
    public function store(StorePost $request)
    {

        // Lecture 62
        // $request->validate([
        //     'title' => 'bail|required|min:5|max:10',
        //     'content' => 'bail|required|min:10'
        // ]); // bail rule will stop the further rules when there is one rule break found
        // https://laravel.com/docs/8.x/validation#available-validation-rules

        // dump($request->input());

        // In Lecture 64 have created our own request in Requests Folder
        $validated = $request->validated();

        // Lecture 61
        // $post = new BlogPost();
        // // $post->title = $request->input('title');
        // // $post->content = $request->input('content');
        // $post->title = $validated['title'];
        // $post->content = $validated['content'];
        // $post->save();

        // Lecture 67
        $post = BlogPost::create($validated); // Mass Assignment

        // BlogPost::create() will create the instance and save it in a dB
        // BlogPost::make() will create the instance but will not save it in a dB

        // Lecture 65
        $request->session()->flash('status', 'Your Post has been created successfully');

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
        $post = BlogPost::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();
        $request->session()->flash('status', 'Blog Post has been Updated Successfully');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $post = BlogPost::findOrFail($id);
        $post->delete();

        session()->flash('status', 'Post has been deleted successfully');
        return redirect()->route('posts.index');
    }
}
