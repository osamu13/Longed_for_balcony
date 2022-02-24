@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2 class="catch_copy">{{ $user->name }}さんの投稿</h2>
    </div>
    <div class="my-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿したい人はこちらから！</a>
    </div>
    <div class="card p-4 mb-4 card-body-bg">
        <div class="col-md-4">
            <a href="{{ route('posts.index') }}" class="btn return-posts mb-4">投稿一覧に戻る</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white h2">このバルコニー・ベランダには何が合う？</div>

        <div class="card-body-bg">
            @foreach ($posts as $post)
            <div class="card-body pb-5">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="card-title m-0">{{ $post->title }}</h4>
                    <p class="d-inline mb-0 mx-4 rounded">コメント数：<span class="text-danger">{{ $post->comments->count() }}</span>件</p>
                </div>
                <div class="d-md-flex mb-3">
                    <p class="card-text mb-0">投稿者：{{ $post->user->name }}</p>
                    <p class="card-text mb-0 mx-md-3">投稿日：{{ $post->created_at }}</p>
                    <p class="card-text mb-0 mx-md-3">更新日：{{ $post->updated_at }}</p>
                </div>
                <div class="d-lg-flex justify-content-center">
                    <div class="mb-4 col-lg-8">
                        <img src="{{ '/storage/'.$post->image }}" alt="" class="post_img">
                    </div>
                    <div class="col-lg-4">
                        <h5 class="card-text mb-3">カテゴリ：
                            <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}" class="text-decoration-none">{{ $post->category->category_name }}</a>
                        </h5>
                        <h5 class="card-text content mb-3">{{ $post->content }}</h5>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">コメントして！</a>
                    </div>
                </div>
            </div>
            @endforeach
            @if (isset($search_query))
            {{ $posts->appends(['search' => $search_query])->links() }}
            @else
            {{ $posts->links() }}
            @endif
        </div>
        
    </div>
</div>
@endsection
