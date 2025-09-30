
<div class="container" id="profilecontainer">
        <div id="message">

        </div>
        <div class="profile-header">
            <div class="profile-info">
                <img src="{{ asset('storage/'.$user->image) }}" alt="Profile Photo" class="profile-photo">
                <div>
                    <h1 class="profile-name">{{ $user->name }}</h1>
                    <p class="profile-title">{{ $user->Prof }}</p>
                    <p class="profile-location">{{ $user->state }}, {{ $user->city }}</p>
                </div>
            </div>
            <a href="#" class="profilebtn" id="profilebtn">Edit Profile</a>
        </div>

        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">About</h2>
            </div>
            <div class="section-content">
                <p>
                    {{ $user->About }}
                </p>
            </div>
        </div>
@if($exp->isEmpty())
        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">Add your Previous Experience if any</h2>
            </div>
            <a href="#" class="profilebtn" id="addexpbutton">Add Experience</a>
        </div>
@else
        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">Previous Experience</h2>
            </div>
            
            <div class="section-content">
            @foreach($exp as $x)
                <div class="experience-item">
                    <h3>{{$x->position}}</h3>
                    <p class="experience-company">{{$x->company}}</p>
                    <p class="experience-date">{{$x->start}} / {{$x->end}}</p>
                    <p class="experience-description">
                        {{ $x->discp }}
                    </p>
                </div>
             @endforeach
            </div>
            <a href="#" class="profilebtn" id="addexpbutton">Add Experience</a>
        </div>
@endif


@if($edu->isEmpty())
        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">Add your education detials</h2>
            </div>
            <a href="#" class="profilebtn" id="addedubutton">Add Education</a>
        </div>

@else

 
        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">Education Detials</h2>
            </div>
            
            <div class="section-content">
            @foreach($edu as $y)
                <div class="education-item">
                    <h3>{{$y->Level}}</h3>
                    <p class="experience-company">{{$y->Institute}}</p>
                    <p class="experience-date">{{$y->start}} / {{$y->end}}</p>
                </div>
             @endforeach
            </div>
            <a href="#" class="profilebtn" id="addedubutton">Add Education</a>
        </div>
 
@endif

<!-- Modal -->
<div class="modal fade" id="model" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add</h5>
      </div>
      <div class="modal-body" id="DataContainer">
        ...
      </div>
    </div>
  </div>
</div>



        <div class="profile-section">
            <div class="section-header">
                <h2 class="section-title">Skills</h2>
            </div>
            <div class="section-content">
                <div class="skills">
                 @foreach($user->skills as $skill)
                    <span class="skill-tag">{{ $skill->name }}</span>
                @endforeach
                </div>
            </div>
        </div>
    </div>
