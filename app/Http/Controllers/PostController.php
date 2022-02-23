<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest('updated_at')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(PostRequest $request) {
        $post = new Post;

        $post->title = $request->title;
        $path = Storage::put('/public', $request->image);
        $path = explode('/', $path);
        $post->image = $path[1];
        $post->content = $request->content;
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('posts.index');
    }

    public function show($id) {
        $post = Post::find($id);

        $comments = Comment::where('post_id', $id)->orderBy('created_at', 'desc')->paginate(10);

        if (!$post) {
            return abort('404');
        }

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
        $post->image = $request->image;
        $post->content = $request->content;

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function search(SearchRequest $request)
    {
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')
                       ->orWhere('content', 'LIKE', '%'.$request->search.'%')
                       ->paginate(5);
        
        $posts_result = $request->search.' '.'の検索結果は'.$posts->total().'件です';
        $search_query = $request->search;

        return view('posts.index', compact('posts', 'posts_result', 'search_query'));
    }
}
