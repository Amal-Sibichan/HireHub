            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
            

    <main>
    <div id="message"></div> 
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
                                    <a href="#"><img src="{{ asset('storage/' . $org->logo) }}" width="100" height="100" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{$org->name}}</h4>
                                    </a>
                                    <ul>
                                        <li>{{$org->city}}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$org->state}}</li>
                                        @if($org->is_approved ==='approved')
                                        <li><i class="fa-solid fa-user-check" style="color: #63E6BE;"></i></li>
                                        @elseif($org->is_approved ==='rejected')
                                        <li><i class="fa-solid fa-user-xmark" style="color: #ba0808;"></i></li>
                                        @else
                                        <li><i class="fa-solid fa-hourglass-start" style="color:rgb(36, 88, 176);"></i></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4> Description</h4>
                                </div>
                                <p>{{$org->description}}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                 <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>{{$org->name}}</span>
                              <p>{{$org->description}}</p>
                            <ul>
                                <li>Name: <span>{{$org->name}} </span></li>
                                <li>Contact : <span> {{$org->phone}}</span></li>
                                <li>Email: <span>{{$org->email}}</span></li>
                            </ul>
                            </div>
                        </div>

                    </div>
                         <div class="apply-btn2">
                            <a href="#" data-url="{{route('Emp.updateform')}}" class="btn btn-primary nav-link" >Update Profile</a>
                         </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </main>