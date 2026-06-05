@extends('layouts.app')

@section('title')
    タスク一覧
@endsection

@section('content')
<form action="{{route("Auth.logout")}}" method="POST">
    @csrf
    <button type="submit">ログアウト</button>
</form>

<h2>タスク一覧</h2>
<a href="{{route("Task.create")}}"><button class="btn">タスク作成</button></a>
@forelse ($tasks as $task)
    <div class="card">
        <h2>{{ $task->title }}</h2>
        <p style="margin-top: 0.5rem; line-height: 1.7;">{{ $task->body }}</p>
        <div class="post-meta">
            <small>状態：{{$task->status}}</small><br>
            <small>期限：{{$task->due_date}}</small><br>
            <div style="display: flex">
                <a href="{{route("Task.edit", $task->id)}}"><button class="btn" style="color: blue">編集</button></a>
                <form action="{{ route('Task.destroy', $task->id) }}" method="POST" onsubmit="return confirm('このタスクを削除しますか？')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="color: red">削除</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="empty">まだ投稿がありません</div>
    <p>{{ session('user_id') }}</p>
@endforelse

@endsection