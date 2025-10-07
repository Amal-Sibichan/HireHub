<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
            <li><a href="{{route('loginpage')}}">Login</a></li>
        </ul>
    </nav>

    <div class="page-wrapper">
        <div class="form-card">
            
            <div class="form-section">
                <h2 class="form-title">REGISTRATION FORM</h2>
                
                <form action="{{route('Emp.save')}}" method="POST">
                    @csrf
          
                        <div class="input-field">
                            <label for="Name">Company Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" required>
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
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" value="{{old('phone')}}" required>
                            @error('phone')
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
            
            <div class="Eregister-image-section">
                </div>
        </div>
    </div>

</body>
</html>