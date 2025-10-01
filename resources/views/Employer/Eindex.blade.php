
        <!-- Top Stats -->
        <div id="imessage"></div>
            @if(session('message'))
               <div class="alert alert-success alert-dismissible" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif
        <section class="stats">
            <div class="card">
                <h3>Total Jobs</h3>
                <p>12</p>
            </div>
            <div class="card">
                <h3>Active Jobs</h3>
                <p>8</p>
            </div>
            <div class="card">
                <h3>Applications</h3>
                <p>245</p>
            </div>
            <div class="card">
                <h3>Reviews</h3>
                <p>54</p>
            </div>
        </section>

        <!-- Listed Jobs -->
        <section class="jobs">
            <h2>Listed Jobs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Posted Date</th>
                        <th>Status</th>
                        <th>Applications</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($jobs as $job) 
                    <tr>
                        <td>{{$job->name}}</td>
                        <td>{{$job->created_at->toFormattedDateString()}}</td>
                        @if (\Carbon\Carbon::now()->greaterThan($job->due))
                        <td><span class="status closed">Closed</span></td>
                        @else
                        <td><span class="status active">Active</span></td>
                        @endif
                        <td>{{$job->application->count()}}</td>
                        <td><button class=" btn btn-warning nav-link" data-url="{{route('Emp.jobedit', ['id' => $job->j_id])}}">Edit</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- Recent Reviews -->
        <section class="reviews">
            <h2>Recent Reviews</h2>
            <ul>
                <li><strong>John Doe:</strong> ⭐⭐⭐⭐ "Great company to work for!"</li>
                <li><strong>Sarah Smith:</strong> ⭐⭐⭐ "Good, but work-life balance can improve."</li>
            </ul>
        </section>
