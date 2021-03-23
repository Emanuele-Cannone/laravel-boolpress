<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ assett( 'css/app.css' ) }}">
    <title>Document</title>
</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="{{ assett( 'js.app.js' ) }}"></script>
    
</body>
</html>