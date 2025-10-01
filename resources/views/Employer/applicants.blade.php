
<div class="candidate-container-unique">

    <!-- Candidate Card -->
    <div class="candidate-profile-card-unique">

        <!-- Candidate Header -->
        <div class="candidate-header-unique">
            <img src="{{ asset('storage/'.$applicant->image) }}" alt="Candidate Photo" class="candidate-photo-unique">
            <div>
                <h1 class="candidate-name-unique">{{$applicant->name}}</h1>
                <p class="candidate-role-unique">Applied for: <strong>{{$job->name}}</strong></p>
                <p class="candidate-location-unique">📍 {{$applicant->city}}, {{$applicant->state}}</p>
            </div>
        </div>

        <!-- Candidate Info -->


        <div class="candidate-info-unique">
            <h2>Personal Information</h2>
            <p><strong>Email:</strong> {{$applicant->email}}</p>
            <p><strong>Phone:</strong> {{$applicant->phone}}</p>
            <p><strong>LinkedIn:</strong> <a href="#">linkedin.com/in/johndoe</a></p>
        </div>
        <!-- Skills -->
        <div class="candidate-skills-unique">
            <h2>Skills</h2>
            <ul>
                <li>Python</li>
                <li>Laravel</li>
                <li>React</li>
                <li>SQL</li>
            </ul>
        </div>

        <!-- Education -->
      <div class="candidate-experience-unique">
            <h2>Education</h2>
            @foreach($applicant->education as $edu)
            <div class="experience-item-unique">
                <h3>{{$edu->Level}} - {{$edu->Institute}}</h3>
                <p><em>{{$edu->start}}- {{$edu->end}}</em></p>
            </div>
            @endforeach
        </div>

        <!-- Experience -->
        <div class="candidate-experience-unique">
            <h2>Experience</h2>
            @foreach($applicant->experience as $exp)
            <div class="experience-item-unique">
                <h3>{{$exp->position}} - {{$exp->company}}</h3>
                <p><em>{{$exp->start}}- {{$exp->end}}</em></p>
                <p>Developed enterprise applications with Laravel & React, collaborated with cross-functional teams, and improved database performance.</p>
            </div>
            @endforeach
        </div>

        <!-- Resume -->
        <div class="candidate-resume-unique">
            <h2>Resume</h2>
            <!-- Option 1: Button -->
            <a href="{{ asset('resumes/johndoe.pdf') }}" target="_blank" class="resume-btn-unique">View Resume</a>
            
            <!-- Option 2: Display Inline -->
            <div class="resume-preview-unique">
                <iframe src="{{ asset('storage/'.$applicant->resume) }}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
