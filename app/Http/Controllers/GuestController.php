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

    public function newPost(Request $request) {

        $data = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'post_content' => 'required',
            'category_id' => 'nullable',
            'tags' => 'nullable',
        ]);

        $post = Post::make($data);
        if($request->get('category_id')) {

            $category = Category::findOrFail($request->get('category_id'));
            $post->category()->associate($category);
        }
        $post->save();

        if($request->get('tags')) {

            $tags = Tag::findOrFail($request->get('tags'));
            $post->tags()->attach($tags);
            $post->save();
        }

        return redirect() -> route('posts');
    }

    public function showAllPosts() {
        $posts = Post::all();
        return json_encode($posts);
    }
}
