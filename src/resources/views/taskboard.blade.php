<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TaskBoard</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>
<body>
    <!-- ログアウト -->
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
    @csrf
    <button type="submit">ログアウト</button>
</form>

    <h1>タスク登録</h1>
<form method="POST" action="{{ route('tasks.store') }}" class="form-card">
    @csrf
    <label>
        タスク名
        <input type="text" name="title" placeholder="タスク名" required>
    </label>

    <label>
        締切日
        <input type="datetime-local" name="due_date">
    </label>

    <label>
        備考
        <textarea name="memo" placeholder="備考"></textarea>
    </label>

    <button type="submit">登録</button>
</form>

    <h2>タスク一覧</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>タスク名</th>
            <th>登録日</th>
            <th>締切日</th>
            <th>備考</th>
            <th>削除</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->registered_at->format('Y-m-d') }}</td> <!-- 日付のみ -->
            <td>{{ $task->due_date ? $task->due_date->format('Y-m-d H:i') : '-' }}</td> <!-- 日付+時刻 -->
            <td>{{ $task->memo }}</td>
            <td>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
