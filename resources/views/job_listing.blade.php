
    <style>
        /* Reset and body styles same as before */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;

}

header {
    text-align: center;
    margin-bottom: 30px;
}

header h1 {
    font-size: 2.5rem;
    margin-bottom: 15px;
}

.search-bar {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.search-bar input {
    width: 300px;
    padding: 10px;
    border: 1px solid #aaa;
    border-radius: 5px;
}

.search-bar button {
    padding: 10px 20px;
    background-color: #0077cc;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.filters button {
    padding: 10px 20px;
    background-color: #0077cc;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.filters {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 30px;
}

.filters select {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

/* Job listings and cards */
.job-listings {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.job-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.job-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.job-header img {
    width: 50px;
    height: 50px;
    object-fit: contain;
    margin-right: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fff;
}

.job-header h2 {
    font-size: 1.2rem;
    color: #0077cc;
}

.job-card p {
    margin-bottom: 8px;
}

.job-card button {
    padding: 10px 15px;
    background-color: #28a745;
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 0px;
}

footer {
    text-align: center;
    margin-top: 40px;
    color: #777;
}
#jobcount{
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center;     /* Center vertically */
}
.center-if-few {
    justify-content: center;
}


    </style>
    <header>
        <div class="search-bar">
        <form id="searchForm" method="GET" action="{{ route('job_listing') }}" class="mb-3 d-flex gap-2">
            <input type="text" name="search" placeholder="Search for jobs...">
            <button type="submit">Search</button>
        </form>
        </div>
    </header>
    <form id="filterform" method="GET" action="{{ route('job_listing') }}">
    <section class="filters">
        <select name="category">
            <option value="">All Categories</option>
            <option value="IT">IT</option>
            <option value="Health">Health</option>
            <option value="Education">Education</option>
            <option value="Finance">Finance</option>
            <option value="Marketing">Marketing</option>
            <option value="Sales">Sales</option>
            <option value="HR">HR</option>
            <option value="Other">Other</option>
        </select>

        <select name="location">
        <option value="">Anywhere</option>
        <option value="Ernakulam" {{ request('location')=='Ernakulam' ? 'selected' : '' }}>Ernakulam</option>
        <option value="kattapana" {{ request('location')=='kattapana' ? 'selected' : '' }}>kattapana</option>
        </select>

        <select name="job_type">
            <option value="">All Job Types</option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
            <option value="Internship">Internship</option>
        </select>
        <button type="submit">Filter</button>
    </section>
    
    </form>
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
            <p><strong>Company:</strong> {{$job->Organization->name}}</p>
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

