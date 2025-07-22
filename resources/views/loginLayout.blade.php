<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Add Font Awesome CDN for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
@yield('content')
<script src="{{ asset('js/login.js') }}"></script>

@if ($errors->any() && old('name'))
    <script>
        window.onload = function () {
            document.getElementById('container').classList.add("right-panel-active");
        };
    </script>
@endif

</body>
</html>