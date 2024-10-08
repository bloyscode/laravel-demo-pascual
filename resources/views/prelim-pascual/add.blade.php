<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Addition</h1>
    <form method="POST" action="{{ route('add') }}">
        @csrf
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1">
        <br>
        <br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2">
        <br>
        <br>
        <button type="submit">Add</button>
        <br>
        <br>
    </form>
    @if(isset($result))
    <p>Result: {{ $result }}</p>
    @endif
    <a href="{{ route('operator')}}">Back to page</a>
</body>
</html>