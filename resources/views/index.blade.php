
  <!-- Hero Section -->
  <section class="hero">
    <h1>Find Your Dream Job</h1>
    <p>Browse thousands of jobs from top companies around the world</p>
    <div class="search-bar">
      <input class="masterinput" type="text" placeholder="Job title or keyword">
      <input class="masterinput" type="text" placeholder="Location">
      <button>Search</button>
    </div>
  </section>

  <!-- Job Listings -->
  <section class="jobs">
    <h2>Latest Jobs</h2>
    <div class="job-list">
     @foreach($jobs as $job)
      <div class="job-card">
        <h3>{{$job->name}}</h3>
        <p>{{$job->Organization->name}}• {{$job->city}}, {{$job->state}}</p>
        <span>{{$job->type}}</span>
      </div>
     @endforeach
    </div>
    <button class="see-more dynamic-link" data-url="{{ route('job_listing') }}">See More Jobs</button>
  </section>

  <!-- Top Companies -->
  <section class="companies">
    <h2>Top Companies</h2>
    <div class="company-list">
      @foreach($org as $x)
      <div class="company-card dynamic-link" data-url="{{ route('company.detials', ['id' => $x->org_id]) }}">{{$x->name}}</div>
      @endforeach
    </div>
  </section>
