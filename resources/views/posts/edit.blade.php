@extends('layouts.common')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">投稿一覧へ戻る</a>
    </div>
    <div class="row">
        <div class="card p-0">
            <div class="card-header bg-danger text-white h2">投稿を編集しましょう!</div>

            <div class="card-body card-body-bg">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @method('PATCH')
                @csrf
                    <div class="form-group mb-4">
                        <label class="h4">タイトル</label>
                        <input type="text" class="form-controller w-100 p-2" placeholder="タイトルを入力してください" name="title" value="{{ $post->title }}">
                        @if ($errors->first('title'))
                        <p class="text-danger">※{{$errors->first('title')}}</p>
                        @endif
                    </div>
                    <div class="form-group mb-4">
                        <input type="hidden" class="form-controller" name="category_id" value="{{ $post->category_id }}">
                    </div>
                    <div class="d-md-flex mb-4">
                        <div class="col-md-8">
                            <h4 class="mb-0">画像</h4>
                            <img src="{{ '/storage/'.$post->image }}" class="post_img">
                        </div>
                        <div class="form-group mb-4">
                            <input type="hidden" class="form-controller w-100" name="image" value="{{ $post->image}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h4">内容</label>
                        <textarea type="text" rows="8" class="form-controller w-100" placeholder="内容を入力してください" name="content">{{ $post->content }}</textarea>
                        @if ($errors->first('content'))
                        <p class="text-danger">※{{$errors->first('content')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">更新する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection