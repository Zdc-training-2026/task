<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'タスク管理')</title>
    <style>
        /* リセット */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* 全体 */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        /* ヘッダー */
        header {
            background: navy;
            color: #fff;
            padding: 0.875rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* ヘッダー内のフォームやボタンを中央揃えにする */
        header form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0;
        }

        /* メインコンテンツ */
        .container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* カード共通 */
        .card {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.25rem;
            margin-bottom: 1rem;
        }

        /* フォーム要素 */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: inherit;
            margin-bottom: 0.75rem;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #1D9E75;
        }

        input[type="email"],
        textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: inherit;
            margin-bottom: 0.75rem;
            transition: border-color 0.2s;
        }

        input[type="email"]:focus,
        textarea:focus {
            outline: none;
            border-color: #1D9E75;
        }

        input[type="password"],
        textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 0.95rem;
            font-family: inherit;
            margin-bottom: 0.75rem;
            transition: border-color 0.2s;
        }

        input[type="password"]:focus,
        textarea:focus {
            outline: none;
            border-color: #1D9E75;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        /* ボタン */
        button {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            border: 1px solid blue;
            font-size: 0.9rem;
            cursor: pointer;
            transition: opacity 0.15s;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .btn-primary {
            background: #1D9E75;
            color: #fff;
        }

        .btn-danger {
            background: none;
            border: 1px solid #ccc;
            color: #888;
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
        }

        .btn-danger:hover {
            border-color: #e24b4a;
            color: #e24b4a;
        }

        /* アラート */
        .alert {
            border-radius: 6px;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #E1F5EE;
            color: #0F6E56;
            border: 1px solid #5DCAA5;
        }

        .alert-error {
            background: #FCEBEB;
            color: #A32D2D;
            border: 1px solid #F09595;
        }

        /* フッター */
        footer {
            text-align: center;
            color: #aaa;
            font-size: 0.8rem;
            padding: 2rem 0;
        }
    </style>
</head>

<body>

    {{-- ヘッダー --}}
    <header>
        <a href="{{route('Task.index')}}" style="text-decoration: none; color: inherit;"><h1>タスク管理アプリ</h1></a>
        @yield('header')
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