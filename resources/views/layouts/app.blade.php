<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'タスク管理')</title>
</head>
<body>

    {{-- ヘッダー --}}
    <header>
        <h1>タスク管理アプリ</h1>
    </header>

    {{-- メインコンテンツ（各ページの内容がここに入る） --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- フッター --}}
    <footer>
        <p>タスク管理アプリ &copy; {{ date('Y') }}</p>
    </footer>

</body>
</html>