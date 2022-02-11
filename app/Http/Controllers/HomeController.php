<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function newPost() {
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.newPost', compact('tags', 'categories'));
    }

    public function addPost(Request $request) {

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

    public function editPost($id) {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.editPost', compact('post', 'categories', 'tags'));
    }

    public function updatePost(Request $request, $id) {
        $data = $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'post_content' => 'required',
            'category_id' => 'nullable',
            'tags' => 'nullable',
        ]);

        $post = Post::findOrFail($id);
        $post->update($data);

        if($request->get('category_id')) {

            $category = Category::findOrFail($request->get('category_id'));
            $post->category()->associate($category);
            $post->save();
        }

        if($request->get('tags')) {

            $tags = Tag::findOrFail($request->get('tags'));
        } else {
            $tags = [];
        }
        $post->tags()->sync($tags);
        $post->save();

        return redirect() -> route('posts');
    }

    public function deletePost($id) {
        $post = Post::findOrFail($id);
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('posts');
    }
}
