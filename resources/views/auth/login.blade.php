@extends('layouts.app')

@section('title')
    ログイン
@endsection

@section('content')
<h2>ログイン</h2>
<form method="POST" action="{{route('Auth.login')}}">
    @csrf
    <label for="email">メールアドレス</label><br>
    <input type="email" name="email" id="email" required><br>
    <label for="password">パスワード</label><br>
    <input type="password" name="password" id="password" required><br>
    <button type="submit">ログイン</button>
</form>
<p>ユーザー登録はお済みですか？<a href="{{route('Auth.showRegister')}}">新規登録</a></p>
@endsection