<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            <li><a href="{{route('loginpage')}}">Login</a></li>
        </ul>
    </nav>

    <div class="page-wrapper">
        <div class="form-card">
            
            <div class="form-section">
                <h2 class="form-title">REGISTRATION FORM</h2>
                
                <form action="{{route('u.register')}}" method="POST">
                    @csrf
                        <div class="input-field">
                            <label for="Name">First Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    
                    <div class="input-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                        <div class="input-field">
                            <label for="Phone">Phone</label>
                            <input type="number" id="Phone" name="Phone" value="{{old('Phone')}}" required>
                            @error('Phone')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    
                    
                    <div class="input-field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="input-field">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" required>
                        @error('confirmPassword')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>               
                    
                    <button type="submit" class="register-button">REGISTER NOW</button>
                    
                    <p class="alt-link">Already have an account? <a href="{{route('loginpage')}}">Login here</a></p>
                </form>
            </div>
            
            <div class="register-image-section">
                </div>
        </div>
    </div>

</body>
</html>