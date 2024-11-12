<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(!Auth::check())
    <h1>You are not authenticated, please login <a href="{{route('login-form')}}">Login</a></h1>
    @else
        @if(Auth::user()->hasRole('admin'))
            <h1>Welcome Admin, {{ Auth::user()->name}}</h1>
        @elseif(Auth::user()->hasRole('judge'))
                <h1>Welcome Judge, {{ Auth::user()->name}}</h1>
        @else
            <h1>Welcome Staff, {{ Auth::user()->name}}</h1>
        @endif
            <form method="POST" action="{{ route('logout')}}"></form>
                @csrf




    <form method="POST" action="{{ route('logout')}}">
        @csrf
        <x-dropdown-link :href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();">
        <h1>{{ __( 'Logout')}}</h1>
</x-dropdown-link>
</form>
@endif    
</body>
</html>