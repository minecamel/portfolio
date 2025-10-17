<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>

<h1>ログイン</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <p>ユーザー名</p>
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    </div>
    <div>
        <p>パスワード</p>
        <input type="password" name="password" placeholder="Password">
    </div>
    <br>
    <button type="submit">ログイン</button>
</form>

@if ($errors->any())
    <p style="color:red;">{{ $errors->first() }}</p>
@endif

<p>アカウントを持っていない場合は <a href="/register">こちら</a></p>
