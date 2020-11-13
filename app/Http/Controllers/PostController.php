<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $category = Category::all();
        $user = User::all();
        $posts = Post::orderBy('pridano', 'desc')->take(10)->withCount('response')->get();
        
        return view('post.index', compact(['posts']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        Post::create([]); //validace

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        $responses = Response::where('prispevek_id', $post->ID)->get();
        $user = User::all();
        $category = Category::where('id', $post->kategorie_id)->get('nazev');
        return view('post.detail', compact(['post', 'responses', 'user', 'category']));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.update', compact(['post','categories']));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($this->validateInput($request));
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }

    public function list()
    {
        $posts = Post::get();

        return view('post.list', compact('posts'));
    }

    public function categoryList($category) //get posts by given category
    { 
        $posts = Post::where('kategorie_id', $category)->get();
        return view('post.byCategory', compact('posts'));
    }

    public function validateInput($input)
    {
        return $input->validate([]); //validovat input - doplnit vars
    }

}
