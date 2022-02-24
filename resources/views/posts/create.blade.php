@extends('layouts.common')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('posts.index') }}" class="btn return-posts">投稿一覧に戻る</a>
    </div>
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header bg-success text-white h2">家のバルコニー・ベランダ写真を投稿しよう！</div>

                <div class="card-body card-body-bg">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group mb-4">
                            <label class="h5">タイトル</label>
                            <input type="text" class="form-controller w-100 p-2" placeholder="タイトルを入力してください" name="title" value="{{ old('title') }}">
                            @if ($errors->first('title'))
                            <p class="text-danger">※{{$errors->first('title')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label class="h5">カテゴリ</label>
                            <select name="category_id" class="form-control">
                                <option value="">選択する</option>
                                <option value="1">質問したい</option>
                                <option value="2">自慢のバルコニーを見せたい</option>
                            </select>
                            @if ($errors->first('category_id'))
                            <p class="text-danger">※{{$errors->first('category_id')}}</p>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label class="h5">画像</label>
                            <input type="file" class="form-controller w-100" name="image" value="{{ old('image') }}">
                            @if ($errors->first('image'))
                            <p class="text-danger">※{{$errors->first('image')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="h5">内容</label>
                            <textarea type="text" rows="8" class="form-controller w-100" placeholder="内容を入力してください" name="content">{{ old('content') }}</textarea>
                            @if ($errors->first('content'))
                            <p class="text-danger">※{{$errors->first('content')}}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection