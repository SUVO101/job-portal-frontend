<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title',"jobPortal")
    </title>
    @include('layout.head')
</head>
<body class="md:ps-8 md:pe-8">
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
</body>
</html>