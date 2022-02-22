@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2 class="catch_copy">ベランダ・バルコニー、オシャレできていますか？<br>投稿してみんなの意見をもらおう！</h2>
    </div>
    <div class="my-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿したい人はこちらから！</a>
        </div>
    <div class="">
        <div class="card">
            <div class="card-header bg-success text-white h3">このバルコニー・ベランダには何が合う？</div>

            @foreach ($posts as $post)
            <div class="card-body mb-3">
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
                        <h4 class="mb-3 text-primary">内容</h4>
                        <h5 class="card-text content">{{ $post->content }}</h5>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">コメントして！</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
