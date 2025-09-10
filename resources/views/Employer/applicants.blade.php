<div class="card">
    <div class="card-header">
        Applicant Detials
        <button class="btb btn-secoundary"></button>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/'.$applicant->image) }}" alt="phpto" class="img-fluid rounded-circle mb-3" width="100" height="100">
                <h5>{{$applicant->name}}</h5>
                <p class="text-muted">{{$applicant->email}}</p>
            </div>

            <div class="col-md-9">
                <h6>Persional Detials</h6>
                <p><strong>Phone:</strong>{{$applicant->phone}}</p>
                <h6>Skills</h6>
                <p>abcd</p>
                <h6><strong>Education</strong></h6>
                @foreach($applicant->education as $edu)
                <p>{{$edu->Level}}</p>
                @endforeach
                <h6><strong>Experience</strong></h6>
                @foreach($applicant->experience as $exp)
                <p>{{$exp->position}}</p>
                @endforeach

                <h6>Resume</h6>
                @if($applicant->resume)
                <a href="{{ asset('storage/'.$applicant->resume) }}" target="blank" class="btb btn-success ntb-sm">View Resume</a>
                @endif
            </div>

        </div>

    </div>

</div>