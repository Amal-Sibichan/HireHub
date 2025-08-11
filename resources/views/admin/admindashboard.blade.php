<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
       <div class="col-lg-3 col-md-2">
                            <div class="logo">
                                <a href=" #"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
                            </div>  
                        </div>
            <nav class="nav-menu">
                <ul>
                    <li class="active">
                        <a href="#dashboard">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#users">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="#settings">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#reports">
                            <i class="fas fa-chart-bar"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile">
                    <span class="username">{{Auth::user()->name}}</span>
                    <a href="#notifications" class="notification-link">
                        <div class="notifications">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </div>
                    </a>
                    <a href="#profile" class="profile-link">
                        <div class="profile-pic">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </a>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <a href="#users" class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>{{$usercount}}</h3>
                            <p>Total Users</p>
                        </div>
                    </a>
                    <a href="#orders" class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-building"></i>
                            <h3>{{$orgcount}}</h3>
                            <p>Total Organizations</p>
                        </div>
                    </a>
                    <a href="#revenue" class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-dollar-sign"></i>
                            <h3>0</h3>
                            <p></p>
                        </div>
                    </a>
                    <a href="#tasks" class="stat-card">
                        <i class="fas fa-clock"></i>
                        <h3>0</h3>
                        <p>Pending Tasks</p>
                    </a>
                </div>

                <!-- Users and Organizations Section -->
                <div class="users-orgs-section">
                    <div class="users-section">
                        <h3>Recent Users</h3>
                        <div class="users-list">
                            @foreach ($user as $user)
                            <div class="user-item">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-details">
                                    <p class="user-name">{{$user->name}}</p>
                                    <span class="user-role">{{$user->Role}}</span>
                                </div>
                                <div class="user-status">
                                    <span class="status-dot active"></span>
                                    <span class="status-text">{{$user->email}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="more-button">View All Users</button>
                    </div>

                    <div class="organizations-section">
                        <h3>Organizations</h3>
                        <div class="orgs-list">
                            @foreach ($org as $org)
                            <div class="org-item">
                                <div class="org-logo">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="org-details">
                                    <p class="org-name">{{$org->name}}</p>
                                    <span class="org-members">{{$org->user_id}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="more-button">View All Organizations</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
