
<div class="company-profile-container-unique">

    <!-- Banner -->
    <div class="company-banner-unique">
        <img src="{{ asset('img/banner/combany-banner.png') }}" alt="Company Banner">
    </div>

    <!-- Profile Card -->
    <div class="company-profile-card-unique">
        <div class="company-logo-section-unique">
            <img src="{{ asset('storage/' . $org->logo) }}" alt="Company Logo" class="company-logo-img-unique">
        </div>
        <div class="company-info-section-unique">
            <h1 class="company-name-unique">{{$org->name}}</h1>
            <ul>
             @if($org->is_approved ==='approved')
                    <li><i class="fa-solid fa-user-check" style="color: #63E6BE;"></i></li>
             @elseif($org->is_approved ==='rejected')
                    <li><i class="fa-solid fa-user-xmark" style="color: #ba0808;"></i></li>
             @else
                    <li><i class="fa-solid fa-hourglass-start" style="color:rgb(36, 88, 176);"></i></li>
            @endif
            </ul>
            <p class="company-tagline-unique">Innovating the Future</p>

            <div class="company-details-unique">
                <p><strong>Industry:</strong> Information Technology</p>
                <p><strong>Location:</strong> {{$org->city}}, {{$org->state}}</p>
                <p><strong>Email:</strong> {{$org->email}}</p>
                <p><strong>Phone:</strong> {{$org->phone}}</p>
                <p><strong>Website:</strong> <a href="#">{{$org->website}}</a></p>
            </div>

            <div class="company-description-unique">
                <h3>About Us</h3>
                <p>
                    {{$org->description}}
                </p>
            </div>
             <a href="#" data-url="{{route('Emp.updateform')}}" class="company-update-btn-unique nav-link" >Update Profile</a>
        </div>
    </div>
</div>
