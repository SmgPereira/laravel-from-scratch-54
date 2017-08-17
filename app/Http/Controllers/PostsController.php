<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
   public function index() {
       return view('posts.index');
   }

    public function show() {
        return view('posts.show');
    }

    public function create() {
       return view('posts.create');
    }

    public function store() {

        //Create new post..
        $post = new \App\Post;

//        //..using the request data
//        $post->title = request('title');
//        $post->body = request('body');
//
//        //Save it to the database
//        $post->save();

        Post::create(request(['title', 'body']));

        //And redirect to the homepage
        return redirect('/');

    }
}
