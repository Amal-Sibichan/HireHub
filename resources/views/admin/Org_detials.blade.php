<!-- Company Section -->
<section class="company-profile">
  <div class="company-header">
    <img src="{{ asset('storage/' . $org->logo) }}" alt="Company Logo" class="company-logo">
    <h1>{{ $org->name }}</h1>
    <ul>
      @if($org->is_approved === 'approved')
        <li><i class="fa-solid fa-user-check" style="color: #63E6BE;"></i></li>
      @elseif($org->is_approved === 'rejected')
        <li><i class="fa-solid fa-user-xmark" style="color: #ba0808;"></i></li>
      @else
        <li><i class="fa-solid fa-hourglass-start" style="color:rgb(36, 88, 176);"></i></li>
      @endif
    </ul>
    <p>Innovating the future of technology and AI</p>
  </div>

  <!-- Image Carousel -->
  <div class="carousel">
    <div class="slides">
      <img src="office1.jpg" alt="Office 1">
      <img src="office2.jpg" alt="Office 2">
      <img src="office3.jpg" alt="Office 3">
    </div>
    <button class="carouselprev">&#10094;</button>
    <button class="carouselnext">&#10095;</button>
  </div>

  <!-- Company Details -->
  <div class="company-details">
    <h2>About the Company</h2>
    <p>{{ $org->description }}</p>
    <ul>
      <li><strong>Founded:</strong> {{ $org->founded }}</li>
      <li><strong>Location:</strong> {{ $org->city }}, {{ $org->state }}</li>
      <li><strong>Email:</strong> {{$org->email}}</li>
      <li><strong>Industry:</strong> Technology & Internet Services</li>
      <li><strong>Identification info:</strong> <a href="{{ asset('storage/' . $org->identity) }}" target="_blank" class="btn btn-primary">view</a></li>

    </ul>
    <div class="action-buttons ">
    @if($org->is_approved === 'approved')
      <a href="#" class="reject-btn" id="openRejectModal">Reject</a>
    @else
      <a href="{{ route('org.approve', ['v' => 1, 'id' => $org->org_id]) }}" class="accept-btn">Approve</a>
      <a href="#" class="reject-btn" id="openRejectModal">Reject</a>
    @endif
  </div>
  </div>


  <!-- User Reviews -->
  <div class="reviews mt-5">
    <h2>User Reviews</h2>
    <div class="review-card">
      <h3>⭐️⭐️⭐️⭐️⭐️</h3>
      <p>"Amazing work culture and growth opportunities!"</p>
      <span>- Alice</span>
    </div>
  </div>
</section>

<div class="modal" id="rejectModal">
    <div class="modal-content">
      <span class="close-btn" id="closeModal">&times;</span>
      <h2>Reject Company</h2>
      <form>
        <label for="reason">Reason for Rejection</label>
        <textarea id="reason" placeholder="Enter rejection reason..." required></textarea>
        <button type="submit" class="submit-btn">Submit</button>
      </form>
    </div>
  </div>

<!-- Carousel Script -->
<script>
  let slides = document.querySelector('.slides');
  let images = document.querySelectorAll('.slides img');
  let prev = document.querySelector('.carouselprev');
  let next = document.querySelector('.carouselnext');
  let index = 0;

  function showSlide(i) {
    if (i >= images.length) index = 0;
    if (i < 0) index = images.length - 1;
    slides.style.transform = `translateX(${-index * 100}%)`;
  }

  next.addEventListener('click', () => {
    index++;
    showSlide(index);
  });

  prev.addEventListener('click', () => {
    index--;
    showSlide(index);
  });

  $(document).on('click', '#openRejectModal', function () {
  $('#rejectModal').css('display', 'flex');
});

$(document).on('click', '#closeModal', function () {
  $('#rejectModal').css('display', 'none');
});

$(document).on('click', function (e) {
  if (e.target.id === 'rejectModal') {
    $('#rejectModal').css('display', 'none');
  }
});



  </script>
  
