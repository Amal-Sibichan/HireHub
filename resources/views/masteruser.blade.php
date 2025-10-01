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
      <a href="#">Companies</a>
      @if(auth()->check())
      <a href="{{ route('logout') }}">Logout</a>
      @elseif(auth()->guard('Organization')->check())
      <a href="{{ route('Emp.logout') }}">Logout</a>
      @else
      <a href="{{ route('loginpage') }}">Login</a>
      @endif
      <a href=" {{ route('contact') }}">Contact</a>
      <a href="#" data-url="{{ route('user.profile') }}" class=" dynamic-link"><i class="fa-solid fa-user" style="color: #63E6BE;"></i></a>
    </nav>
  </header>
<div id="user-content">

 </div>

  <!-- Footer -->
  <footer>
    <p>© 2025 JobFinder. All rights reserved.</p>
  </footer>
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



</body>
</html>