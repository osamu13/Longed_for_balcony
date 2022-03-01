@extends('layouts.common')

@section('content')
<div class="container">
    <div>
        <h2 class="catch_copy">ベランダ・バルコニー、オシャレできていますか？<br>投稿して意見をもらおう！</h2>
    </div>
    <div class="my-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary"><span class="h5">投稿したい人はこちらから！</span></a>
    </div>
    <div class="card p-4 mb-4 card-body-bg">
        <div class="col-md-6">
            <a href="{{ route('posts.index') }}" class="btn return-posts mb-4">ホームに戻る</a>
            @if (isset($category_query) && $category_query == 1) 
            <h2 class="mb-3"><span class="text-danger">カテゴリ：質問</span><span class="mx-2"></span>の投稿一覧です</h2>
            @elseif (isset($category_query) && $category_query == 2)
            <h2 class="mb-3"><span class="text-danger">カテゴリ：参考</span><span class="mx-2"></span>の投稿一覧です</h2>
            @endif
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
            <h4 class="mb-4 text-danger">{{ $posts_result }}</h4>
            @endif
        </div>
        <h5>※投稿者の名前を押すと、その投稿者が投稿したものが全て見れるよ！</h5>
        <h5>※カテゴリの名前を押すと、そのカテゴリの投稿一覧が見れるよ！</h5>
    </div>
    <div class="card">
        <div class="card-header bg-success text-white h2">このバルコニー・ベランダには何が合う？</div>

        <div class="card-body-bg">
            @foreach ($posts as $post)
            <div class="card-body pb-3">
                <div class="d-md-flex align-items-center mb-2">
                    <h3 class="card-title mb-2">{{ $post->title }}</h3>
                    <h5 class="d-inline mb-0 mx-md-4 rounded">コメント数：<span class="text-danger">{{ $post->comments->count() }}</span>件</h4>
                </div>
                <div class="d-lg-flex mb-3">
                    <h5 class="card-text mb-2">投稿者：<a href="{{ route('users.show', $post->user_id) }}">{{ $post->user->name }}</a></h5>
                    <p class="card-text mb-0 mx-lg-3">投稿日：{{ $post->created_at }}</p>
                    <p class="card-text mb-0 mx-lg-3">更新日：{{ $post->updated_at }}</p>
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
                        <like-component :post="{{ json_encode($post)}}"></like-component>
                    </div>
                </div>
            </div>
            @endforeach
            @if (isset($search_query))
            {{ $posts->appends(['search' => $search_query])->links() }}
            @elseif (isset($category_query))
            {{ $posts->appends(['category_id' => $category_query])->links() }}
            @else
            {{ $posts->links() }}
            @endif
        </div>
        
    </div>
</div>
@endsection
