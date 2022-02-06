<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class GuestController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function register() {
        return view('pages.register');
    }

    public function login() {
        return view('pages.login');
    }

    public function showPosts() {
        return view('pages.posts');
    }

    public function newPost(Request $request) {
        $data = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'post_content' => 'required'
        ]);

        $post = Post::create($data);
        return redirect() -> route('posts');
    }

    public function showAllPosts() {
        $posts = Post::all();
        return json_encode($posts);
    }
}
