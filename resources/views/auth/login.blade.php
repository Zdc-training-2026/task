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
    <input type="submit">
</form>
@endsection