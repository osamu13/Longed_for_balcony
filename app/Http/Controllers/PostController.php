<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest('updated_at')->get();

        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(PostRequest $request) {
        $post = new Post;
        //インスタンスの作成
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();

        //インスタンス保存
        $post->save();

        return redirect()->route('posts.index');
    }

    public function show($id) {
        $post = Post::find($id);

        $comments = Comment::where('post_id', $id)->orderBy('created_at', 'desc')->get();

        return view('posts.show', compact('post', 'comments'));
    }

    public function edit($id) {
        $post = Post::find($id);

        if ($post->user_id !== Auth::id()) {
            return abort('404');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id) {
        $post = Post::find($id);
        
        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
