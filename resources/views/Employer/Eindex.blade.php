
        <!-- Top Stats -->
        <div id="imessage"></div>
            @if(session('message'))
               <div class="alert alert-warning alert-dismissible" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif
        <section class="stats">
            <div class="card">
                <h3>Total Jobs</h3>
                <p>{{$jobs->count()}}</p>
            </div>
            <div class="card">
                <h3>Active Jobs</h3>
                <p>{{ $activeJobs }}</p>
            </div>
            <div class="card">
                <h3>Applications</h3>
                <p>{{$applications->count()}}</p>
            </div>
            <div class="card">
                <h3>Reviews</h3>
                <p>{{$reviews->count()}}</p>
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
         @if($reviews->count() > 0)
        <section class="reviews">
           @foreach($reviews as $review)
            <h2>Recent Reviews</h2>
            <ul>
                <li><strong>{{$review->user->name}}:</strong><h6>{!!str_repeat('<i class="fa-solid fa-star" style="color: #FFD43B;"></i>',$review->rating)!!}</h6>
                "{{$review->review}}"</li>
            </ul>
            @endforeach
        </section>
        @endif


        <script type="text/javascript">
            setTimeout(function() {
                $('.alert').fadeOut('slow'); // or .slideUp('slow')
            }, 3000); 

        </script>
