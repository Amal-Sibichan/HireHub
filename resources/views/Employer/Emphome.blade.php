<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

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
                        <a href="#dashboard">
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
                        <a href="#reports">
                            <i class="fas fa-chart-bar"></i>
                            <span>reports</span>
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

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
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
                    <a href="{{route('Emp.profile')}}" class="profile-link">
                        <div class="profile-pic">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </a>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
            @if(session('message'))
               <div class="alert alert-success alert-dismissible" role="alert">
                   {{ session('message') }}
                   <button type="button" class="btn-close" onclick="" aria-label="Close"></button>
               </div>
            @endif
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <a href="#Posts" class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>1,245</h3>
                            <p>Posts</p>
                        </div>
                    </a>
                    <a href="{{route('Emp.jobform')}}" class="stat-card">
                        <div class="stat-card">
                            <i class="fa-solid fa-plus"></i>
                            <p>New job</p>
                        </div>
                    </a>
                    <a href="#Applicants" class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>$12,456</h3>
                            <p>Applicants</p>
                        </div>
                    </a>
                    <a href="#Recent Jobs" class="stat-card">
                        <i class="fas fa-clock"></i>
                        <h3>45</h3>
                        <p>Recent Jobs</p>
                    </a>
                </div>

                <!-- Users and Organizations Section -->
                <div class="users-orgs-section">
                    <div class="users-section">
                        <h3>History</h3>
                        <div class="users-list">
                            <div class="user-item">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-details">
                                    <p class="user-name">John Doe</p>
                                    <span class="user-role">Admin</span>
                                </div>
                                <div class="user-status">
                                    <span class="status-dot active"></span>
                                    <span class="status-text">Active</span>
                                </div>
                            </div>
                            <div class="user-item">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-details">
                                    <p class="user-name">Jane Smith</p>
                                    <span class="user-role">Manager</span>
                                </div>
                                <div class="user-status">
                                    <span class="status-dot"></span>
                                    <span class="status-text">Offline</span>
                                </div>
                            </div>
                            <div class="user-item">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-details">
                                    <p class="user-name">Mike Johnson</p>
                                    <span class="user-role">User</span>
                                </div>
                                <div class="user-status">
                                    <span class="status-dot active"></span>
                                    <span class="status-text">Active</span>
                                </div>
                            </div>
                        </div>
                        <button class="more-button">View All Users</button>
                    </div>

                    <div class="organizations-section">
                        <h3>Recent Jobs</h3>
                        <div class="orgs-list">
                            <div class="org-item">
                                <div class="org-logo">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="org-details">
                                    <p class="org-name">Tech Solutions</p>
                                    <span class="org-members">125 Members</span>
                                </div>
                            </div>
                            <div class="org-item">
                                <div class="org-logo">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="org-details">
                                    <p class="org-name">Marketing Pro</p>
                                    <span class="org-members">89 Members</span>
                                </div>
                            </div>
                            <div class="org-item">
                                <div class="org-logo">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="org-details">
                                    <p class="org-name">Creative Agency</p>
                                    <span class="org-members">56 Members</span>
                                </div>
                            </div>
                        </div>
                        <button class="more-button">View All Organizations</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
