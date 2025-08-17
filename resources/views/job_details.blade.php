@extends('masteruser')
    @section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{$jobs->name}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ asset('storage/' . $jobs->Organization->logo) }}" width="100" height="100" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{$jobs->name}}</h4>
                                    </a>
                                    <ul>
                                        <li>{{$jobs->Organization->name}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$jobs->city}}</li>
                                        <li>{{$jobs->salary}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p>{{$jobs->description}}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <ul>
                                   @foreach($skills as $x)
                                   <li>{{$x}}</li>
                                   @endforeach
                               </ul>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <ul>
                               @foreach($exp as $x)
                                   <li>{{$x}}</li>
                                   @endforeach
                               </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span>{{$jobs->created_at->toFormattedDateString()}}</span></li>
                              <li>Location : <span>{{$jobs->city}}</span></li>
                              <li>Job nature : <span>Full time</span></li>
                              <li>Salary :  <span>${{$jobs->salary}}monthly</span></li>
                              <li>Application date : <span>{{\Carbon\Carbon::parse($jobs->due)->toFormattedDateString()}}</span></li>
                          </ul>
                         <div class="apply-btn2">
                            <a href="#" class="btn">Apply Now</a>
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>{{$jobs->Organization->name}}</span>
                              <p>{{$jobs->Organization->description}}</p>
                            <ul>
                                <li>Name: <span>{{$jobs->Organization->name}} </span></li>
                                <li>Web : <span> colorlib.com</span></li>
                                <li>Email: <span>{{$jobs->Organization->email}}</span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
   @endsection