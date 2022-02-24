@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2 class="catch_copy">ベランダ・バルコニー、オシャレできていますか？<br>投稿して意見をもらおう！</h2>
    </div>
    <div class="my-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">投稿したい人はこちらから！</a>
    </div>
    <div class="card p-4 mb-4 card-body-bg">
        <div class="col-md-4 col-md-offset-3">
        <a href="{{ route('posts.index') }}" class="btn return-posts mb-4">投稿一覧に戻る</a>
            <h4 class="search-form-title">検索フォーム</h4>
            <form action="{{ route('posts.search') }}" class="search-form mb-4" method="GET">
                <div class="form-group has-feedback d-flex">
                    <input type="text" class="form-control" name="search" placeholder="search">
              		<button class="btn btn-dark btn-lg" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
            	</div>
                @if ($errors->first('search'))
                <p class="text-danger">※{{$errors->first('search')}}</p>
                @endif
            </form>
            @if (isset($posts_result))
            <h5 class="m-0">{{ $posts_result }}</h5>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white h2">このバルコニー・ベランダには何が合う？</div>

        <div class="card-body-bg">
            @foreach ($posts as $post)
            <div class="card-body pb-3">
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
