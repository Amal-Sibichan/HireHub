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
  @if($org->images->count() > 0)
  <div class="carousel">
    <div class="slides">
      @foreach($org->images as $image)
      <img src="{{ asset('storage/' . $image->image) }}" alt="Office 1">
      @endforeach
    </div>
    <button class="carouselprev">&#10094;</button>
    <button class="carouselnext">&#10095;</button>
  </div>
  @endif
  <!-- Company Details -->
  <div class="company-details">
    <h2>About the Company</h2>
    <p>{{ $org->description }}</p>
    <ul>
      <li><strong>Founded:</strong> {{ $org->founded }}</li>
      <li><strong>Location:</strong> {{ $org->city }}, {{ $org->state }}</li>
      <li><strong>Email:</strong> {{$org->email}}</li>
      <li><strong>Industry:</strong> Technology & Internet Services</li>
    </ul>
@if(Auth::user())
  <div class="add-review">
  <h2>Submit a Review</h2>
  <form id="reviewForm">
    <input type="hidden" name="company_id" value="{{ $org->org_id }}">
    <label for="reviewText">Your Review</label>
    <textarea id="reviewText" name="review" placeholder="Write your review..." required></textarea>

    <label>Rating</label>
    <div class="star-rating">
      <span data-value="1">☆</span>
      <span data-value="2">☆</span>
      <span data-value="3">☆</span>
      <span data-value="4">☆</span>
      <span data-value="5">☆</span>
    </div>
    <input type="hidden" name="rating" id="reviewRating" required>
    <button type="submit" class="submit-btn">Submit Review</button>
  </form>
</div>
@endif  <!-- User Reviews -->

@if($reviews->count() > 0) 
  <div class="reviews mt-5">
    <h2>User Reviews</h2>
    @foreach($reviews as $review)
    <div class="review-card">
      <h4>{!!str_repeat('<i class="fa-solid fa-star" style="color: #FFD43B;"></i>',$review->rating)!!}</h4>
      <p>{{ $review->review }}</p>
      <span>- {{ $review->user->name }}</span>
    </div>
    @endforeach
      </div>
@endif
</section>

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

  setInterval(() => {
    index++;
    showSlide(index);
  }, 3000); 

const reviewForm = document.getElementById("reviewForm");
const reviewText = document.getElementById("reviewText");
const reviewRatingInput = document.getElementById("reviewRating");
const stars = document.querySelectorAll(".star-rating span");
const reviewList = document.querySelector(".reviews ul");

let selectedRating = 0;

// Star selection
stars.forEach(star => {
  star.addEventListener("click", () => {
    selectedRating = star.dataset.value;
    reviewRatingInput.value = selectedRating;
    stars.forEach(s => s.classList.remove("selected"));
    for (let i = 0; i < selectedRating; i++) {
      stars[i].classList.add("selected");
    }
  });
});

// AJAX submission
reviewForm.addEventListener("submit", function(e) {
  e.preventDefault();

  const formData = new FormData(reviewForm);

  fetch("{{ route('reviews.store') }}", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": "{{ csrf_token() }}",
    },
    body: formData,
  })
  .then(res => res.json())
  .then(data => {
    if(data.success){
      // Add review to page
      const li = document.createElement("li");
      li.textContent = "⭐️".repeat(selectedRating) +  "${reviewText.value}";
      reviewList.prepend(li);

      // Reset form
      reviewForm.reset();
      selectedRating = 0;
      stars.forEach(s => s.classList.remove("selected"));
    }
  })
  .catch(err => console.log(err));
});
</script>
  
