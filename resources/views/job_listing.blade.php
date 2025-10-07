
    <div class="searcheader">
        <div class="searchfilter">
        <form id="searchForm" method="GET" action="{{ route('job_listing') }}" class="mb-3 d-flex gap-2">
            <input type="text" name="search" placeholder="Search for jobs...">
            <button type="submit">Search</button>
        </form>
        </div>
    <form id="filterform" method="GET" action="{{ route('job_listing') }}">
    <section class="filters">
        <select name="category">
            <option value="">All Categories</option>
            <option value="IT" {{ request('category')=='IT' ? 'selected' : '' }}>IT</option>
            <option value="Health" {{ request('category')=='Health' ? 'selected' : '' }}>Health</option>
            <option value="Education" {{ request('category')=='Education' ? 'selected' : '' }}>Education</option>
            <option value="Finance" {{ request('category')=='Finance' ? 'selected' : '' }}>Finance</option>
            <option value="Marketing" {{ request('category')=='Marketing' ? 'selected' : '' }}>Marketing</option>
            <option value="Sales" {{ request('category')=='Sales' ? 'selected' : '' }}>Sales</option>
            <option value="HR" {{ request('category')=='HR' ? 'selected' : '' }}>HR</option>
            <option value="Other" {{ request('category')=='Other' ? 'selected' : '' }}>Other</option>
        </select>

        <select name="location">
        <option value="">Anywhere</option>
        <option value="Ernakulam" {{ request('location')=='Ernakulam' ? 'selected' : '' }}>Ernakulam</option>
        <option value="kattapana" {{ request('location')=='kattapana' ? 'selected' : '' }}>kattapana</option>
        </select>

        <select name="job_type">
            <option value="">All Job Types</option>
            <option value="Full Time"{{ request('job_type')=='Full Time' ? 'selected' : '' }}>Full Time</option>
            <option value="Part Time"{{ request('job_type')=='Part Time' ? 'selected' : '' }}>Part Time</option>
            <option value="Internship"{{ request('job_type')=='Internship' ? 'selected' : '' }}>Internship</option>
        </select>
        <button type="submit">Filter</button>
    </section>
    
    </form>
    </div>
    <div id="jobcount">  
        <span >{{ $totalJobs }} Jobs found</span>
    </div>
    <div class="job-listings {{ count($jobs) <= 5 ? 'center-if-few' : '' }}">
        @foreach($jobs as $job)
        <div class="job-card">
            <div class="job-header">
                <img src="{{ asset('storage/' . $job->Organization->logo) }}" alt="Tech Solutions Logo">
                <h2>{{ $job->name}}</h2>
            </div>
            <p><strong>Company:</strong><a href="" class=" dynamic-link" data-url="{{ route('company.detials', ['id' => $job->Organization->org_id]) }}">{{$job->Organization->name}}</a> </p>
            <p><strong>Location:</strong>{{$job->city}}</p>
            <p><strong>Salary:</strong> ₹{{$job->salary}}</p>
            <p><strong>Category:</strong> {{$job->category}}</p>
            <p><strong>Job Type:</strong> {{$job->type}}</p>
            <button data-url="{{ route('job_details',['id' => $job->j_id])}}" class="btn dynamic-link">Apply Now</button>
            <span>{{$job->created_at->diffForHumans()}}</span>
        </div>
        @endforeach
    </div>

<div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                            {!! $jobs->links() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
