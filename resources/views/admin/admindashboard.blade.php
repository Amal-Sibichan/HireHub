<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Job Portal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('css/admin2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></head>
<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">Hire<span>Hub</span></div>
    <ul>
      <li class=" dynamic-link" data-url="{{route('admin.index')}}"><i class="fas fa-home"></i> Dashboard </li>
      <li><i class="fas fa-briefcase" ></i> Manage Jobs</li>
      <li class="dropdown">
  <div class="dropdown-toggle">
    <i class="fas fa-building"></i> Companies @if($waitingorg > 0)<i class="fa-solid fa-bell fa-xs" style="color: #d72619;"></i> @endif
  </div>
  <ul class="submenu">
    <li class="dynamic-link" data-url="{{ route('showorganization', ['id' => 0]) }}">
      <i class="fas fa-building"></i> Companies 
    </li>
    <li class="dynamic-link" data-url="{{ route('showorganization', ['id' => 1]) }}">
      <i class="fas fa-building"></i> New Request @if($waitingorg > 0)<span class="badge">{{$waitingorg}}</span> @endif
    </li>
  </ul>
</li>

      <li class="dynamic-link" data-url="{{route('showusers')}}"><i class="fas fa-users " ></i> Users</li>
      <li><i class="fas fa-user-shield"></i> Admins</li>
      <li ><a href="{{route('logout')}}" class="side-a"><i class="fa-solid fa-right-from-bracket"></i>logout</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <div id="admin-content">

  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script > const eroute={
            admindash:"{{route('admin.index')}}",
        };
     </script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>