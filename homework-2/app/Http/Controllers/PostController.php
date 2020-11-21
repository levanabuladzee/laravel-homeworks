<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts')->with('posts', $posts);
    }

    public function myPosts() {
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();

        return view('myposts')->with('posts', $posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id);

        return view('post')->with('post', $post);
    }

    public function create() {
        return view('create');
    }

    public function save(Request $request) {
        $post = new Post($request->all());

        $post->save();

        return redirect()->back();
    }

    public function edit($id) {
        $post = Post::findOrFail($id);

        return view('edit')->with('post', $post);
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect()->back();
    }

    public function delete(Post $post) {
        $post->delete();

        return redirect()->back();
    }
}
