<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('img/avatars/favicon.png')}}" />
    <title>Aethon Payroll</title>

    <style>
        /* for push styles */
        @stack('styles')
    </style>

    <!-- for push head files -->
        @stack('head')
</head>
<body>
@yield('content')
@stack('scripts')
</body>
</html>
