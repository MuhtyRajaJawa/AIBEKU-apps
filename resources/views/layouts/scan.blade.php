<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TAMBAHKAN INI -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'AIBEKU')</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @vite([
        'resources/css/app.css',
        'resources/css/scan.css',
        'resources/js/app.js',
        'resources/js/scan.js'
    ])

</head>

<body>

    @yield('content')

</body>

</html>