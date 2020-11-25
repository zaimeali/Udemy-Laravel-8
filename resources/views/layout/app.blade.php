<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 8 Course - @yield('title')</title>

        {{-- CSS --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
            <h5 class="my-0 mr-md-auto font-weight-normal">Laravel App</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ route('home.index') }}">Home</a>
                <a class="p-2" href="{{ route('home.contact') }}">Contact</a>
                <a class="p-2" href="{{ route('posts.index') }}">Blog Posts</a>
                <a class="p-2" href="{{ route('posts.create') }}">Add New Post</a>
            </nav>
        </div>
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @yield('content')
        </div>

        {{-- JS --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer>
            // defer bcz the website will not for js to load
        </script> --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </body>
</html>