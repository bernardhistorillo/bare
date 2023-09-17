<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{--    <meta name="title" content="{{ $meta['title'] }} | {{ config('app.name') }}" />--}}
{{--    <meta name="description" content="{{ $meta['description'] }}">--}}
{{--    <meta name="author" content="Bellyn Studio">--}}

{{--    <meta property="og:url" content="{{ URL::current() }}" />--}}
{{--    <meta property="og:type" content="website" />--}}
{{--    <meta property="og:title" content="{{ $meta['title'] }} | {{ config('app.name') }}" />--}}
{{--    <meta property="og:description" content="{{ $meta['description'] }}" />--}}
{{--    <meta property="og:image" content="{{ $meta['image'] }}" />--}}

    <link rel="icon" href="{{ asset('img/home/icon.png') }}">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">

    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">

    <link href="{{ asset(mix('/css/app.css')) }}" rel="stylesheet">

{{--    <title>{{ $meta['title'] }} | {{ config('app.name') }}</title>--}}
</head>
<body style="overflow-x:hidden">
    <div id="app">

        <router-view></router-view>

        <input type="hidden" id="route-name" value="{{ Route::currentRouteName() }}" ref="routeName" />
        <input type="hidden" value="{{ config('app.url') }}" ref="appUrl" />
    </div>

    <script src="{{ asset(mix('/js/app.js')) }}"></script>

    <script>
        window.pageData = {
            title: 'Laravel Page Title',
            description: 'Laravel Page Description',
        };
    </script>
</body>
</html>
