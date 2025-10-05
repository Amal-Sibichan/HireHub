<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<nav class="navbar">
        <div class="logo">
            <a href="#">Hire<span class="highlight">Hub</span></a>
        </div>
        <ul class="nav-links">
            <li><a href="{{route('master')}}">Home</a></li>
            <li><a href="#">Browse Jobs</a></li>
            <li><a href="#">Companies</a></li>
            <li><a href="{{route('registerpage')}}">Register</a></li>
        </ul>
    </nav>
@if(session('message'))
        <div class="custom-alert" id="success-alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="page-wrapper">
        <div class="form-card">
            <div class="form-section">
                <h2 class="form-title">LOGIN TO YOUR ACCOUNT</h2>
                <form action="{{route('u.login')}}" method="POST">
                    @csrf
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="login-button">LOGIN NOW</button>
                    <p class="alt-link">Don't have an account? <a href="{{route('registerpage')}}">Register here</a></p>
					<p class="alt-link"> <a href="{{route('Emp.register')}}">Register as employer</a></p>

                </form>
            </div>
            <div class="image-section">
                </div>
        </div>
    </div>
	<script>
    // Pure JavaScript Method
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        
        if (alert) {
            // Wait 3000 milliseconds (3 seconds) before starting the fade
            setTimeout(function() {
                // Add the 'faded' class to trigger the CSS fade-out effect
                alert.classList.add('faded');
                
                // After the fade transition is complete (0.5s), remove the element entirely
                // This ensures the element is gone from the page layout
                setTimeout(function() {
                    alert.remove();
                }, 500); // This delay must match the CSS transition duration (0.5s)
            }, 3000); // 3-second initial delay
        }
    });
</script>
</body>
</html>