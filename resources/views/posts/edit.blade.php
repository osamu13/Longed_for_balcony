@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row">
        <div class="card p-0">
            <div class="card-header bg-danger text-white">投稿を編集しましょう!</div>

            <div class="card-body">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @method('PATCH')
                @csrf
                    <div class="form-group mb-4">
                        <label>タイトル</label>
                        <input type="text" class="form-controller w-100 p-2" placeholder="タイトルを入力してください" name="title" value="{{ $post->title }}">
                        @if ($errors->first('title'))
                        <p class="text-danger">※{{$errors->first('title')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>内容</label>
                        <textarea type="text" rows="8" class="form-controller w-100" placeholder="内容を入力してください" name="content">{{ $post->content }}</textarea>
                        @if ($errors->first('content'))
                        <p class="text-danger">※{{$errors->first('content')}}</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">更新する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection