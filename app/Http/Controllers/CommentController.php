<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;

        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;

        $comment->save();

        $post = Post::find($request->post_id);
        $comments = Comment::where('post_id', $request->post_id)->latest()->get();

        $request->session()->regenerateToken();

        return redirect()->route('posts.show', compact('post', 'comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post = Post::find($comment->post_id);
        $comment->delete();

        return redirect()->route('posts.show', compact('post'));
    }
}
