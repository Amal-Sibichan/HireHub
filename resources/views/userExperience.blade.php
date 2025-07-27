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
            
            <form class="needs-validation" novalidate action="{{route('store.exp')}}" method='post' enctype="multipart/form-data">
                @csrf
    
                <div class="form-section">
                    <h2 class="section-title">Experience</h2>
                    <div id="experienceList">
                        <div class="experience-item">
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" id="title" name="title">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" id="company" name="company">
                            @error('company')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="startDate">Start Date</label>
                                <input type="date" id="startDate" name="expStart">
                            @error('startDate')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="endDate">End Date</label>
                                <input type="date" id="endDate" name="expEnd">
                            @error('endDate')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" placeholder="Ex:" rows="3"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn">Save Changes</button>
                    <a href="{{ route('user.profile') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

