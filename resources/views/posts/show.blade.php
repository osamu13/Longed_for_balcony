@extends('layouts.common')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{route('posts.index')}}" class="btn return-posts">投稿一覧に戻る</a>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white h2">このバルコニー・ベランダには何が合う？</div>

        <div class="card-body card-body-bg">
            <h4 class="card-title">{{ $post->title }}</h4>
            <div class="d-md-flex mb-3">
                <p class="card-text mb-0">投稿者：{{ $post->user->name }}</p>
                <p class="card-text mb-0 mx-md-3">投稿日：{{ $post->created_at }}</p>
                <p class="card-text mb-0 mx-md-3">更新日：{{ $post->updated_at }}</p>
            </div>
            <div class="d-lg-flex justify-content-center">
                <div class="mb-4 col-lg-8">
                    <img src="{{ '/storage/'.$post->image }}" alt="" class="post_img">
                </div>
                <div class="col-lg-4 mb-4">
                    <h4>内容</h4>
                    <h5 class="card-text content">{{ $post->content }}</h5>
                </div>
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
            <div class="card-header comment-header-bg h5">投稿者：{{ $comment->user->name }}</div>
            <div class="card-body card-body-bg">
                <p class="card-title mb-4">投稿日：{{ $comment->created_at }}</p>
                <h5 class="card-text">{{ $comment->content }}</h5>
                @if (Auth::id() === $comment->user_id)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除する" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">
                </form>
                @endif
            </div>
        </div>
        @endforeach
        {{ $comments->links() }}
    </div>
</div>
@endsection