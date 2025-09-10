     

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div id="message"></div>
            @if(session('message'))
               <div class="alert alert-success alert-dismissible" role="alert">
                   {{ session('message') }}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            @endif
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <a href="#" data-url="{{route('Emp.apppage')}}" class="stat-card nav-link">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>1</h3>
                            <p>Applications</p>
                        </div>
                    </a>
                    <a href="#" data-url="{{route('Emp.jobform')}}" class="stat-card nav-link">
                        <div class="stat-card">
                            <i class="fa-solid fa-plus"></i>
                            <p>New job</p>
                        </div>
                    </a>
                    <a href="#Applicants"  class="stat-card">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>$12,456</h3>
                            <p>Applicants</p>
                        </div>
                    </a>
                    <a href="#Recent Jobs" data-url="{{route('Emp.showjobs')}}" class="stat-card nav-link">
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
                        @foreach($jobs as $job)
                        <div class="orgs-list">
                            <div class="org-item">
                                <div class="org-logo">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="org-details">
                                    <p class="org-name">{{$job->name}}</p>
                                    <span class="org-members">{{$job->j_id}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <button class="more-button">View All Jobs</button>
                    </div>
                </div>
            </div>