<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth Page')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        * {
	box-sizing: border-box;
}

body {
	background: linear-gradient(to left, #0077ff, #00c6ff);;
	font-family: 'Montserrat', sans-serif;
	margin-top: 100px;
	padding: 0;
	min-height: 100vh;
	display: flex;
	justify-content: center;
	align-items: flex-start;
}
        .auth-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 3rem;
            max-width: 700px;
            margin: 0 auto;
            width: 90%;
        }
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-header h1 {
            color: #333;
            margin-bottom: 0.5rem;
        }
        .auth-header p {
            color: #666;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            padding: 0.5rem 2rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2e59d9;
        }
        .text-danger {
            color: #e74a3b !important;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h1>Register</h1>
            <p>Register to create an account</p>
        </div>
        <form class="needs-validation" novalidate action="{{route('Emp.save')}}" method='post' enctype="multipart/form-data">
        @csrf
        
        <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{old('name')}}" required>
                                        <label for="name">Full Name</label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{old('email')}}" required>
                                        <label for="email">Email Address</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control form-control-lg" id="pass" name="pass" required>
                                        <label for="pass">Password</label>
                                    </div>
                                    @error('pass')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="pho" name="pho" value="{{old('pho')}}" required>
                                        <label for="pho">Phone Number</label>
                                    </div>
                                    @error('pho')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary btn-lg w-100" type="submit">Register</button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p>Already have an account? <a href="{{route('loginpage')}}">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>