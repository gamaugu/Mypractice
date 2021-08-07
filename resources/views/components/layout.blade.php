<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>マイアプリ - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
</head>
<body>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
            @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
