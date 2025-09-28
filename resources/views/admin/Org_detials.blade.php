
  <style>
    .approval-card {
      max-width: 1000px;
      margin: 30px auto;
      background: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .banner {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .company-logo {
      width: 100px;
      height: 100px;
      object-fit: contain;
      border-radius: 50%;
      border: 2px solid #ddd;
      margin-top: -50px;
      background: #fff;
      padding: 10px;
      position: relative;
      z-index: 10;
    }

    .company-header {
      text-align: center;
      margin-top: -40px;
      margin-bottom: 30px;
    }

    .company-info ul {
      list-style: none;
      padding: 0;
    }

    .company-info li {
      margin-bottom: 8px;
    }

    .gallery img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 5px;
    }

    .gallery .col-md-4 {
      margin-bottom: 15px;
    }

    .action-buttons {
      text-align: center;
      margin-top: 30px;
    }

    .action-buttons button {
      width: 150px;
      margin: 10px;
    }
  </style>

  <div class="approval-card">

    <!-- Company Banner -->
    <img src="{{ asset('img/banner/combany-banner.png') }}" class="banner" alt="Banner">

    <!-- Company Logo & Header -->
    <div class="company-header">
      <img src="{{asset('storage/' . $org->logo)}}" class="company-logo" alt="Logo">
      <h2>{{$org->name}}</h2>
      <p>category • {{$org->city}}, {{$org->state}}</p>
      <ul>
         @if($org->is_approved ==='approved')
            <li><i class="fa-solid fa-user-check" style="color: #63E6BE;"></i></li>
         @elseif($org->is_approved ==='rejected')
            <li><i class="fa-solid fa-user-xmark" style="color: #ba0808;"></i></li>
         @else
            <li><i class="fa-solid fa-hourglass-start" style="color:rgb(36, 88, 176);"></i></li>
         @endif
      </ul>
    </div>

    <!-- Company Details -->
    <div class="company-info mb-4">
      <h4>Company Information</h4>
      <p>{{$org->description}}</p>
      <ul>
        <li><strong>Founded:</strong> {{$org->founded}}</li>
        <li><strong>Website:</strong> <a href="https://futuretech.com" target="_blank">futuretech.com</a></li>
        <li><strong>Employees:</strong>..</li>
  
        <li><strong>Submission Date:</strong> {{$org->created_at->diffForHumans()}}</li>
        <li>Identification info: <a href="{{ asset('storage/' . $org->identity) }}" target="_blank" class="btn btn-primary">view</a></li>

      </ul>
    </div>

    <!-- Gallery Section -->
    <div class="gallery mb-4">
      <h4>Submitted Images</h4>
      <div class="row">
        <div class="col-md-4">
          <img src="https://via.placeholder.com/400x200?text=Office+1" alt="Office 1">
        </div>
        <div class="col-md-4">
          <img src="https://via.placeholder.com/400x200?text=Office+2" alt="Office 2">
        </div>
        <div class="col-md-4">
          <img src="https://via.placeholder.com/400x200?text=Team+Photo" alt="Team">
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
             @if($org->is_approved === 'approved')
                <a href="{{route('org.approve',['v'=>0,'id'=>$org->org_id])}}" class="btn btn-danger">Reject</a>
             @else
                <a href="{{route('org.approve',['v'=>1,'id'=>$org->org_id])}}" class="btn btn-primary">Approve</a>
                <a href="{{route('org.approve',['v'=>0,'id'=>$org->org_id])}}" class="btn btn-danger">Reject</a>
             @endif
      <!-- <button class="btn btn-success">Approve</button>
      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button> -->
    </div>

  </div>

  <!-- Reject Modal -->
  <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rejectModalLabel">Reject Company Submission</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <label for="rejectionReason" class="form-label">Reason for rejection</label>
          <textarea class="form-control" id="rejectionReason" rows="4" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Send Rejection</button>
        </div>
      </form>
    </div>
  </div>

