<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>Hier zijn alle producten</h1>
    @foreach ($products as $product)
        @if ($product->name != 'Fanta')
            <p>{{$product->name}}</p>
        @endif
    @endforeach
</body>
</html>