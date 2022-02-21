@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2>ベランダ・バルコニー、オシャレできていますか？<br>投稿してみんなの意見をもらおう！</h2>
    </div>
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿したい人はこちらから！</a>
    </div>
    <div class="">
        <div class="card">
            <div class="card-header bg-success text-white">このバルコニー・ベランダには何が合う？</div>

            @foreach ($posts as $post)
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <div class="d-flex">
                    <p class="card-text">投稿日：{{ $post->created_at }}</p>
                    <p class="card-text mx-4">投稿者：{{ $post->user->name }}</p>
                </div>
                <h5 class="card-text content">{{ $post->content }}</h5>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細画面へ</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
