<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>Create Product</h1>

    <form action="/product/store" method="POST">
    @csrf
        <label for="name">Naam van het Product</label>
        <input type="text" name="name">
        @error('name')
            <span style="color:red"> {{$message}}</span>
        @enderror
        <label for="price">Prijs van het Product</label>
        <input type="number" required name="price" min="0" value="0" step="any">
        @error('price')
            <span style="color:red"> {{$message}}</span>
        @enderror
        <label for="amount">Aantal van het Product</label>
        <input type="number" name="amount" step="0.1">
        @error('amount')
            <span style="color:red"> {{$message}}</span>
        @enderror

        <input type="submit" value="verzend">
    </form>

</body>
</html>