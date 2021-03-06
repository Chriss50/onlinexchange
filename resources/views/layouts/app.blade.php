<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('src/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('includes.header')
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-2">
                    @auth
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('dashboard')}}">Home</a>
                        </li>
                        {{-- <li class="list-group-item">
                            <a href="{{route('currency')}}">Create Currency</a>
                        </li> --}}
                        <li class="list-group-item">
                            <a href="{{route('currency.balance')}}">Check Balance</a>
                        </li>
                    </ul>
                    @endauth
                </div>
                <div class="col-lg-10">
                    @include('includes.message')
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
