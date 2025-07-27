@extends('masteruser')
    @section('content')

    <div class="container">
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
        <div class="edit-form">
            <h1>Edit Profile</h1>
            
            <form class="needs-validation" novalidate action="{{route('store.edu')}}" method='post' enctype="multipart/form-data">
            @csrf
                <div class="form-section">
                    <input type="hidden" name="user_id" value="{{encrypt($user->user_id)}}">
                    <h2 class="section-title">Education</h2>
                    <div id="educationList">
                        <div class="education-item">
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" id="lev" name="lev" required>
                            </div>
                             @error('lev')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="institute">Institution</label>
                                <input type="text" id="inst" name="inst" required>
                            </div>
                                @error('inst')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror


                                 <div class="form-group">
                                <label for="course">Course</label>
                                <input type="text" id="course" name="course" required>
                            </div>

                            @error('course')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="eduStartDate">Start Date</label>
                                <input type="date" id="eduStart" name="eduStart" required>
                            </div>
                            @error('eduStart')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="eduEndDate">End Date</label>
                                <input type="date" id="eduEnd" name="eduEnd" placeholder="keep empty if still studying">
                            </div>
                            @error('eduEnd')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn">Save Changes</button>
                    <a href="{{ route('user.profile', encrypt(auth()->user()->user_id)) }}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
