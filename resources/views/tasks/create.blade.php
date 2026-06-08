@extends('layouts.app')

@section('title')
    タスク作成
@endsection

@section('header')
<h3>{{session("user_name")}}様</h3>
<form action="{{route("Auth.logout")}}" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endsection

@section('content')
    <h1>新しいタスクを作成</h1>

    {{-- 登録成功時のメッセージ --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- バリデーションエラーの表示 --}}
    {{-- @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ error }}</li>
            @endforeach
        </ul>
    @endif --}}

    {{-- フォームの作成 --}}
    <form action="{{ route('Task.store') }}" method="POST">
        @csrf {{-- クロスサイトリクエストフォージェリ対策 --}}

            <label for="title">タスク名:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>

            <label for="body">内容:</label>
            <input type="text" id="body" name="body" value="{{ old('body') }}">

            <label for="select1">状態:</label><br>
            <input type="radio" id="select1" name="status" value="未着手" {{ old ('release') == '未着手' ? 'checked' : '' }}>
            <label for="select1">未着手</label>

            <input type="radio" id="select2" name="status" value="進行中" {{ old ('release') == '進行中' ? 'checked' : '' }}>
            <label for="select2">進行中</label>

            <input type="radio" id="select3" name="status" value="完了" {{ old ('release') == '完了' ? 'checked' : '' }}>
            <label for="select3">完了</label><br>

            <label for="due_date">期限:</label><br>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"/><br><br>

        <div style="display:flex; gap:12px; margin-top:8px;">
            <button type="submit" style="color: blue">登録</button>
            <button type="button" onclick="location.href='{{ route('Task.index') }}'" style="color: red">キャンセル</button>
        </div>
    </form>
@endsection
