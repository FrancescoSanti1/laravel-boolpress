<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

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
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('pages.posts', compact('categories', 'posts', 'tags'));
    }

    public function showAllPosts() {
        $posts = Post::all();
        return json_encode($posts);
    }
}
