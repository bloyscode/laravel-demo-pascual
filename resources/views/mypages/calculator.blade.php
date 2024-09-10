<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.css'])
    <title>Calculator</title>
</head>
<body>
    <div class="mx-auto text-center bg-gray-200">
        <h1 class="font-bold mt-2">This is calculator</h1>
    <form action="{{ route('callcalculate') }}" method="post" class="mt-5">
        @csrf
        <label for="num1">Number 1:</label>
        <input type="text" name="number1" id="num1" autofocus>
        @if  ($errors->has('number1'))
        <span class="text-danger">{{ $errors->first('number1')}}</span>
        @endif

        <br>
        <br>
        <label for="num2">Number 2:</label>
        <input type="text" name="number2" id="num2" autofocus>
        @if  ($errors->has('number2'))
        <span class="text-danger">{{ $errors->first('number2')}}</span>
        @endif
        <br>
        <button class="bg-blue-500 px-4 text-white
        hover:bg-blue-800 mt-5 mb-4">Calculate🤌🤌🤌</button>
    </form>
    <h3 class="text-x1">Result:</h3>
    </div>
    @if($result != null)
    <span class="text-x1">Sum: {{ $result }}</span>
    @else
    <span class="text-x1">Sum: not yet calculated!</span>
    @endif
</body>
</html>