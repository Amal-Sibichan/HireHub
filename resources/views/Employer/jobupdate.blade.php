@extends('masteruser')
    @section('content')
    <div class="container">
        <div class="edit-form">
            <h1>Post new Job</h1>
            
            <form class="needs-validation" novalidate action="{{route('Emp.job.add')}}" method='post' enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <h2 class="section-title">Basic Information</h2>
                    <input type="hidden" name="org_id" value="#">
                    <div class="form-group">
                        <label for="JobName">Job Role</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="descriptin">Job Description</label>
                        <textarea name="desc" id="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skill">Preferred skills</label>
                        <textarea name="skill" id="skill"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="education">Educational Experience/Educational requerments</label>
                        <textarea name="edu" id="edu" placeholder="specify skills seperated by commas"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">City</label>
                        <input type="text"  id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text"  id="salary" name="salary">
                    </div>
                    <div class="form-group">
                        <label for="due">due date</label>
                        <input type="date"  id="due" name="due">
                    </div>
                </div>
                </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Save Changes</button>
                    <a href="#" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
