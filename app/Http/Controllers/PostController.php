<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except(['index', 'show']);
        //$this->middleware('auth')->only(['edit', 'create','update','store','delete']);
    }

    public function index()
    {
        // select * from posts;
        //$postsFromDB = Post::all();
        //dd($postsFromDB);

        $postsFromDB = Post::all();
        return view("posts.index", ['posts' => $postsFromDB]);
    }


    public function show($postId)
    {
        //select * from posts where id = $postId limit 1;
        //$singlePostFromDB = Post::find($postId);    //model object 
        //dd($singlePostFromDB);

        //select * from posts where id = $postId limit 1;
        //$sinlePostFromDB = Post::where('id', $postId)->first(); //model object 
        //$singlePostFromDB = Post::where('id', $postId)->orderBy('title')->first();
        //dd($singlePostFromDB);

        //select * from posts where id = $postId;
        //$singlePostFromDB = Post::where('id', $postId)->get();
        //dd($singlePostFromDB);


        // $singlePostFromDB=Post::find($postId);
        // if(is_null($singlePostFromDB)){
        //     return to_route('posts.index');
        // } 


        // 

        $singlePostFromDB = Post::findOrFail($postId);
        return view('posts.show', ['post' => $singlePostFromDB]);
    }



    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);

    }

    public function store(Request $request)
    {

        // 1- get the user data

        $title = $request->title;
        $description = $request->description;
        $user_id = $request->post_creators;

        // 2- store the data in database

        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();

        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required|min:5',
            'post_creators' => 'required|exists:users,id'
        ]);


        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id
        ]);


        return to_route("posts.index");
    }

    public function edit($postId)
    {
        $post = Post::findOrFail($postId);

        $users = User::all();
        return view("posts.edit", ["users" => $users, "post" => $post]);
    }

    public function update(Request $request, $postId)
    {
        $title = $request->title;
        $description = $request->description;
        $user_id = $request->edit_by;


        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required|min:5',
            'edit_by' => 'required|exists:users,id'
        ]);



        Post::findOrFail($postId)->update([
            "title" => $title,
            "description" => $description,
            "user_id" => $user_id
        ]);

        return to_route("posts.show", ["post" => $postId]);
    }

    public function destroy($postId)
    {

        // Post::where("title", $title)->delete(); delete all title with same name

        // $post= Post::findOrFail($postId);
        // $post->delete();

        Post::findOrFail($postId)->delete();

        return to_route('posts.index');
    }

}


