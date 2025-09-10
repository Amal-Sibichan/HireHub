   <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="{{ asset('img/hero/about.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{$org->name}}</h2>
                           
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
                                    <a href="#"><img src="{{ asset('storage/' . $org->logo) }}" width="100" height="100" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{$org->name}}</h4>
                                    </a>
                                    
                                    <ul>
                                        <li>Creative Agency</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{$org->city}}, {{$org->state}}</li>
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
                                <p>{{$org->discription}}</p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                 <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span>Colorlib</span>
                              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <ul>
                                <li>Name: <span>{{$org->name}}</span></li>
                                <li>Contact : <span> {{$org->phone}}</span></li>
                                <li>Email: <span>{{$org->email}}</span></li>
                            
                                <li>Identification info: <a href="{{ asset('storage/' . $org->identity) }}" target="_blank" class="btn btn-primary">view</a></li>
                                

                            </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Overview</h4>
                           </div>
                          <ul>
                              <li>Est : <span>12 Aug 2019</span></li>
                              <li>Location : <span>{{$org->state}}</span></li>
                              <li>Type : <span>IT</span></li>
                              <li>Acc created : <span>{{$org->created_at}}</span></li>
                          </ul>
                         <div class="apply-btn2">
                            @if($org->is_approved === 'approved')
                            <a href="{{route('org.approve',['v'=>0,'id'=>$org->org_id])}}" class="btn btn-danger">Reject</a>
                            @else
                            <a href="{{route('org.approve',['v'=>1,'id'=>$org->org_id])}}" class="btn btn-primary">Approve</a>
                            <a href="{{route('org.approve',['v'=>0,'id'=>$org->org_id])}}" class="btn btn-danger">Reject</a>
                            @endif
                         </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
