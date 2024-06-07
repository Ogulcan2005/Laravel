<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @stack("styles")
</head>
<body>

{{-- navigatie--}}
<nav>
    <ul>
        <li><a href="/hello">Welkom</a></li>
        <li><a href="#">Over mij</a></li>
        <li><a href="/songs">Songs</a></li>
    </ul>
</nav>

{{-- content--}}
<h1>Hallo from masterpage</h1>
@yield("content")

@push("styles")
    <style>
        body{background-image: url("/images/laravel-featured.jpg");
        }
        p{
            color: red;
        }

    </style>
@endpush


{{-- footer--}}

{{-- Javascript--}}
@stack("js")
</body>
</html>