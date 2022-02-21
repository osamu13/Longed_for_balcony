@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2>ベランダ・バルコニー、オシャレできていますか？<br>投稿してみんなの意見をもらおう！</h2>
    </div>
    <div class="my-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿したい人はこちらから！</a>
        </div>
    <div class="">
        <div class="card">
            <div class="card-header bg-success text-white">このバルコニー・ベランダには何が合う？</div>

            @foreach ($posts as $post)
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <h4 class="card-title m-0">{{ $post->title }}</h4>
                    <p class="bg-primary d-inline text-white p-1 mb-0 mx-4 rounded">コメント数：{{ $post->comments->count() }}件</p>
                </div>
                <div class="d-md-flex mb-3">
                    <p class="card-text mb-0 text-primary">投稿者：{{ $post->user->name }}</p>
                    <p class="card-text mb-0 mx-mb-3">投稿日：{{ $post->created_at }}</p>
                    <p class="card-text mb-0 mx-mb-3">更新日：{{ $post->updated_at }}</p>
                </div>
                <h5 class="card-text content">{{ $post->content }}</h5>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細画面へ</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
