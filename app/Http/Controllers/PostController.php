<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function create(){
        $categories = Category::all();
        return view('posts.admin.create', compact('categories'));
    }

    public function store(Request $request){

        // dd($request);

        // $request->validate([
        //     'title' => ['required', 'max:255', 'min:5', 'unique:posts'],
        //     'content' => ['required'],
        //     'img_url' => 'mimes: png, jpeg, gif'
        // ]);

        if($request->photoUrl != ""){
            $file_name = time() . '.' .$request->photoUrl->extension();
            $path = $request->photoUrl->storeAs(
                'blogs',
                $file_name,
                'public'
            );
        }else{
            $path = "";
        }

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->photoUrl = $path;

        $post->save();

        return redirect('/');


    }
}
