
  <!-- Job Details Section -->
  <section class="job-details">
    <div class="company-info">
      <img src="{{ asset('storage/' . $jobs->Organization->logo) }}" alt="Company Logo" class="company-logo">
      <div>
        <h1>{{$jobs->name}}</h1>
        <p><strong>{{$jobs->Organization->name}}</strong> • {{$jobs->city}}, {{$jobs->state}}</p>
      </div>
    </div>

    <div class="job-meta">
      <span><strong>Job Type:</strong> {{$jobs->type}}</span>
      <span><strong>Salary:</strong> {{$jobs->salary}}/ month</span>
      <span><strong>Due:</strong>{{\Carbon\Carbon::parse($jobs->due)->toFormattedDateString()}}</span>
      <span><strong>Posted:</strong>{{$jobs->created_at->toFormattedDateString()}}</span>
    </div>

    <div class="job-description">
      <h2>Job Description</h2>
      <p>{{$jobs->description}}</p>
    </div>

    <div class="job-skills">
      <h2>Required Skills</h2>
      <ul>
         @foreach($exp as $x)
            <li>{{$x}}</li>
          @endforeach
      </ul>
    </div>
      @if($app==null)
         <a href="{{route('u.applay',['id'=>$jobs->j_id])}}" class="applay-btn">Apply Now </a>
      @else
         <h2 style="color: green;font:medium;">Applied</h2>
      @endif
  </section>