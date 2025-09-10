<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <i class="fas fa-cogs"></i>
                <span>{{Auth::guard('Organization')->user()->name}}</span>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li class="active">
                         <a href="#" data-url="{{route('Emp.index')}}" class="nav-link">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#Applications">
                            <i class="fas fa-users"></i>
                            <span>Applications</span>
                        </a>
                    </li>
                    <li>
                        <a href="#settings">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                    <a href="#" data-url="{{route('Emp.jobform')}}" class="nav-link">
                            <i class="fas fa-chart-bar"></i>
                            <span>Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('Emp.logout')}}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
           
        <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
               
                <div class="user-profile">
                    <span class="username">{{Auth::guard('Organization')->user()->name}}</span>
                    <a href="#notifications" class="notification-link">
                        <div class="notifications">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </div>
                    </a>
                    <a href="#" data-url="{{route('Emp.profile')}}" class="nav-link">
                        <div class="profile-pic">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </a>
                </div>
            </header>
            <div id="message"></div>  
        <div id="content-area">
        

        </div>
        </main>
       
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
