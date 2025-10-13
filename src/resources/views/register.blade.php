<h1>アカウント作成</h1>

<link rel="stylesheet" href="{{ asset('css/common.css') }}">

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/register" method="POST">
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
    <button type="submit">登録</button>
</form>

<p>既にアカウントを持っている場合は <a href="/login">こちら</a></p>
