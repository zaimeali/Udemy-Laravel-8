<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 8 Course - @yield('title')</title>

        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div>
            @if (session('status'))
                <div style="color: green;">
                    {{ session('status') }}
                </div>
            @endif
            
            @yield('content')
        </div>

        {{-- JS --}}
        <script src="{{ asset('js/app.js') }}" defer>
            // defer bcz the website will not for js to load
        </script>
    </body>
</html>