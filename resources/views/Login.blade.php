@extends('loginLayout')
@section('content')
<div class="container {{ isset($registerView) && $registerView ? 'right-panel-active' : '' }}" id="container">
	<div class="form-container sign-up-container">
		<form  action="{{route('u.register')}}" method='post' enctype="multipart/form-data">
            @csrf
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="name" value="{{old('name')}}" required />
                                     @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
			<input type="email" placeholder="Email"  name="email" value="{{old('email')}}" required />
                                     @error('email')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
			<input type="number" placeholder="Phone"  name="pho" value="{{old('pho')}}" required />
                                    @error('pho')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
             <input type="password" placeholder="Password"  name="pass"  required />
                                    @error('pass')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
			<button onclick="">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form  action="{{route('u.login')}}" method='post' enctype="multipart/form-data">
            @csrf
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="Email" placeholder="Email" value="{{old('Email')}}" required/>
			<input type="password"  name="Pass" placeholder="Password" />
             @error('Pass')
              <div class="text-danger small mt-1">{{ $message }}</div>
              @enderror
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
@endsection
