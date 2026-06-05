@extends('layouts.app')

@section('title')
    ユーザー登録
@endsection

@section('content')
<h2>ユーザー登録</h2>
<form method="POST" action="{{route('Auth.register')}}">
    @csrf
    <label for="name">名前</label><br>
    <input type="text" name="name" id="name" required><br>
    <label for="email">メールアドレス</label><br>
    <input type="email" name="email" id="email" required><br>
    <label for="password">パスワード</label><br>
    <input type="password" name="password" id="password" required><br>
    <label for="password_confirmation">パスワードの確認</label><br>
    <input type="password" name="password_confirmation" id="password_confirmation" required><br>
    <input type="submit" value="登録">
</form>
@endsection