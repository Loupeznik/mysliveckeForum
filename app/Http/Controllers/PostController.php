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
        //$responses = Response::where('uzivatel_id', Post::get()); //počet odpovědí k příspěvku  -- VYŘEŠIT JINAK, TOTO JE K PIČI
        $posts = Post::orderBy('pridano', 'desc')->take(10)->get();
        
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

        Issue::create([
            'Name' => $request->Name,
            'user_id' => $request->user_id,
            'types_id' => $request->types_id,
            'priority_id' => $request->priority_id,
            'Desc' => $request->Desc
        ]);

        return redirect('/posts');
    }

    public function show(Post $post)
    {
        return view('post.detail', compact('post'), ['id' => $post->id]); //zjistit k čemu je to 'id'
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.update', compact(['post','categories']));
    }

    public function update(Request $request, Post $post)
    {
        $issue->update($this->validateInput($request));

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $issue->delete();

        return redirect('/posts');
    }

    public function list() 
    {
        $posts = Post::get();

        return view('post.list', compact('posts'));
    }

    public function categoryList(Category $category) { //get posts by given category
        $posts = Post::where('kategorie_id', $category->id)->get(); //čekovat funkčnost
    }

    public function validateInput($input)
    {
        return $input->validate([]); //validovat input - doplnit vars
    }

}
