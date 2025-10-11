<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Portal</title>
  <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo">Hire<span>Hub</span></div>
    <nav>
      <a href="#" data-url="{{ route('index') }}" class=" dynamic-link">Home</a>
      <a href="#" data-url="{{ route('job_listing') }}" class=" dynamic-link"> Jobs </a>
      @if(auth()->check())
      <a href="{{ route('logout') }}">Logout</a>
      @elseif(auth()->guard('Organization')->check())
      <a href="{{ route('Emp.logout') }}">Logout</a>
      @else
      <a href="{{ route('loginpage') }}">Login</a>
      @endif
      <a href=" {{ route('contact') }}">Contact</a>
      @if(auth()->check())
      <a href="#" data-url="{{ route('user.profile') }}" class=" dynamic-link"><i class="fa-solid fa-user" style="color: #63E6BE;"></i></a>
      @endif
    </nav>
  </header>
<div id="user-content">

 </div>

  <!-- Bootstrap JS Bundle (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script > const routes={
            edu_url:"{{ route('update.edu')}}",
            exp_url:"{{ route('update.exp')}}",
            prof_url:"{{route('edit.user')}}",
            store_edu:"{{route('store.edu')}}",
            index:"{{route('index')}}"
        };</script>
<script src="{{ asset('js/ajx.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.carousel-nav .dot');
    let currentIndex = 0;
    const intervalTime = 5000; // Time in ms (5 seconds)
    let autoSlideInterval;

    /**
     * Shows a specific slide and updates the active dot.
     * @param {number} index - The index of the slide to show.
     */
    function showSlide(index) {
        // Wrap index around if it goes out of bounds
        if (index >= items.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = items.length - 1;
        } else {
            currentIndex = index;
        }

        // 1. Hide all items and remove active class
        items.forEach(item => {
            item.classList.remove('active');
            item.style.opacity = 0; // for fade effect
        });

        // 2. Remove active class from all dots
        dots.forEach(dot => {
            dot.classList.remove('active');
        });

        // 3. Show the current item and set it to active
        items[currentIndex].classList.add('active');
        items[currentIndex].style.opacity = 1; // for fade effect

        // 4. Set the corresponding dot to active
        dots[currentIndex].classList.add('active');
    }

    /** Starts the automatic sliding interval. */
    function startAutoSlide() {
        // Clear any existing interval to prevent duplicates
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(() => {
            showSlide(currentIndex + 1);
        }, intervalTime);
    }

    // --- Event Listeners for Dots ---
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            // Reset the auto-slide timer when a dot is clicked
            startAutoSlide();
        });
    });

    // --- Initialization ---
    // 1. Initially show the first slide (which should already be styled as active in HTML/CSS)
    showSlide(0);

    // 2. Start the rotation
    startAutoSlide();
});
</script>



</body>
</html>