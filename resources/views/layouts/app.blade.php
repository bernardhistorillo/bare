<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="@yield('title') | {{ config('app.name') }}" />
    <meta name="description" content="{{ ogDetails()['description'] }}">
    <meta name="author" content="Bellyn Studio">

    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
    <meta property="og:description" content="{{ ogDetails()['description'] }}" />
    <meta property="og:image" content="{{ ogDetails()['image'] }}" />

    <link rel="icon" href="{{ asset('img/home/icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">

    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">

    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet">

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body style="overflow-x:hidden">
    <div id="app">
        @yield('content')

        @include('layouts.includes.modals')

        <input type="hidden" value="{{ Route::currentRouteName() }}" ref="routeName" />
        <input type="hidden" value="{{ config('app.url') }}" ref="appUrl" />
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="{{ asset(mix('/js/app.js')) }}"></script>

</body>
</html>
