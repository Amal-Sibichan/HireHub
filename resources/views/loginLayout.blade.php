<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="page-wrapper">
    {{-- Top Banner --}}
    <div class="banner">
        <h1>Welcome to</h1><div class="logo">Hire<span>Hub</span></div>
        <p>Your career journey starts here. Join us today!</p>
    </div>

    {{-- Flash Messages --}}
    @if(session('message'))
        <div class="custom-alert">
            {{ session('message') }}
        </div>
    @endif

    {{-- Content (Login/Register Forms) --}}
    @yield('content')
</div>

<script src="{{ asset('js/login.js') }}"></script>

@if ($errors->any() && old('name'))
    <script>
        window.onload = function () {
            document.getElementById('container').classList.add("right-panel-active");
        };
    </script>
@endif
<script>
    setTimeout(function() {
        $('.alert').fadeOut('slow'); // or .slideUp('slow')
    }, 3000); 
</script>
</body>
</html>
