<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>
        @yield('title',"jobPortal")
    </title> -->
    <title>@yield('title','Home - '.env('WEBSITE_NAME'))</title>

    <meta name="description" content="@yield('meta_description', 'Find latest jobs and career opportunities.')">

    <meta name="keywords" content="@yield('meta_keywords', 'jobs, career, employment')">

    <meta property="og:title" content="@yield('title', 'Home - '.env('WEBSITE_NAME'))">
    <meta property="og:description" content="@yield('meta_description', 'Browse latest job opportunities and apply online.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    @include('layout.head')
</head>
<body class="md:ps-8 md:pe-8">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
</body>
</html>