@extends('loginLayout')

@section('title', 'Register')
@section('subtitle', 'Create your account to get started.')

@section('content')
    <form class="needs-validation" novalidate action="{{route('u.register')}}" method='post' enctype="multipart/form-data">
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

                                <!-- <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="city" name="city" value="{{old('city')}}" required>
                                        <label for="city">City</label>
                                    </div>
                                    @error('city')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="pho" name="pho" value="{{old('pho')}}" required>
                                        <label for="pho">Phone Number</label>
                                    </div>
                                    @error('pho')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
<!-- 
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="zcode" name="zcode" value="{{old('zcode')}}" required>
                                        <label for="zcode">Zip Code</label>
                                    </div>
                                    @error('zcode')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <!-- <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="add" name="add" value="{{old('add')}}" required>
                                        <label for="add">Address</label>
                                    </div>
                                    @error('add')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <!-- <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control form-control-lg" id="state" name="state" value="{{old('state')}}" required>
                                        <label for="state">State</label>
                                    </div>
                                    @error('state')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <!-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Upload Profile Picture</label>
                                        <input type="file" class="form-control form-control-lg" id="img" name="img" required>
                                        @error('img')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> -->
<!-- 
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="res" class="form-label">Upload Resume</label>
                                        <input type="file" class="form-control form-control-lg" id="res" name="res" required>
                                        @error('res')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> -->

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
@endsection
