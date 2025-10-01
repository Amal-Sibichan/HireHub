<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/orgdash.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
<div class="dashboard-container">

    <!-- Sidebar -->
    <aside class="sidebar">
        <h2 class="logo">Hire<span>Hub</span></h2>
        <ul class="nav-links">
            <li><a href="#"  data-url="{{route('Emp.index')}}" class="nav-link">🏠 Dashboard</a></li>
            <li><a href="#" data-url="{{route('Emp.showjobs')}}" class="nav-link">💼 My Jobs</a></li>
            <li><a href="#"  data-url="{{route('Emp.jobform')}}" class="nav-link">➕ Add Job</a></li>
            <li><a href="#">👥 Applicants</a></li>
            <li><a href="#">⭐ Reviews</a></li>
            <li class="dropdown">
  <div class="dropdown-toggle">
    <i class="fas fa-building"></i>{{Auth::guard('Organization')->user()->name}}
  </div>
  <ul class="submenu">
    <li data-url="{{route('Emp.profile')}}" class="nav-link">
      <i class="fas fa-user"></i> Profile
    </li>
    <li ><a href="{{route('Emp.logout')}}"><i class="fa-solid fa-right-from-bracket"></i>logout</a></li>
  </ul>
</li>   
        </ul>
    </aside>
         
    <!-- Main Content -->
    <div id="content-area">

     </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script > const eroute={
            dash:"{{route('Emp.index')}}",
            add_url:"{{ route('Emp.jobform')}}",
            store_url:"{{route('Emp.job.add')}}",
            Eprof_url:"{{route('Emp.updateform')}}",
        };
        </script> 
 <script src="{{ asset('js/Employer.js') }}"></script>
</body>
</html>