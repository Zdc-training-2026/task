@extends('layouts.app')

@section('title')
タスク一覧
@endsection

@section('header')
<h3 style="padding: 0">{{session("user_name")}}様</h3>
<form action="{{route("Auth.logout")}}" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endsection

@section('content')
<div style="display: flex; justify-content: space-between;">
    <h2>タスク一覧</h2>
    <a href="{{route("Task.create")}}"><button class="btn">＋タスク作成</button></a>
</div>
@forelse ($tasks as $task)
<div class="card">
    <h2>{{ $task->title }}</h2>
    <p style="margin-top: 0.5rem; line-height: 1.7;">{{ $task->body }}</p>
    <div class="post-meta">
        <small>状態：{{$task->status}}</small><br>
        <small>期限：{{$task->due_date}}</small><br>
        <div style="display: flex">
            <a href="{{route("Task.edit", $task->id)}}"><button class="btn" style="color: blue">編集</button></a>
            <form action="{{ route('Task.destroy', $task->id) }}" method="POST"
                onsubmit="return confirm('このタスクを削除しますか？')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="color: red">削除</button>
            </form>
        </div>
    </div>
</div>
@empty
<div class="empty">まだ投稿がありません</div>
@endforelse

@endsection