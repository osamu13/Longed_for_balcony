@extends('layouts.common')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{route('posts.index')}}" class="btn btn-primary">投稿一覧へ戻る</a>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white h2">このバルコニー・ベランダには何が合う？</div>

        <div class="card-body">
            <h4 class="card-title">タイトル:{{ $post->title }}</h4>
            <div class="d-flex">
                <p class="card-text">投稿者：{{ $post->user->name }}</p>
                <p class="card-text mx-md-3">投稿日：{{ $post->created_at }}</p>
                <p class="card-text mx-md-3">更新日：{{ $post->updated_at }}</p>
            </div>
            <div class="d-lg-flex justify-content-center">
                <div class="mb-4 col-lg-8">
                    <img src="{{ '/storage/'.$post->image }}" alt="" class="post_img">
                </div>
                <h5 class="card-text content col-lg-4">{{ $post->content }}</h5>
            </div>
            <div class="d-flex">
                @if (Auth::id() === $post->user_id)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="mx-5">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除する" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-4">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <!-- ~ここから~ 詳細ページの投稿idを送る -->
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <!-- ~ここまで~ -->
            <div class="form-group">
                <label class="h5">コメント</label>
                <textarea name="content" placeholder="コメントを入力" rows="7" class="w-100"></textarea>
                @if ($errors->first('content'))
                <p class="text-danger">※{{$errors->first('content')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">コメントする</button>
        </form>
    </div>
    <div class="mt-4">
        @foreach ($comments as $comment)
        <div class="card mb-3">
            <div class="card-header h5">投稿者：{{ $comment->user->name }}</div>
            <div class="card-body">
                <p class="card-title mb-4">投稿日：{{ $comment->created_at }}</p>
                <h5 class="card-text">{{ $comment->content }}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection