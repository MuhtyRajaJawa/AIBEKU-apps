<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daurin</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    @yield('content')

</body>
</html>