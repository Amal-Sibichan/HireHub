  <!-- Dashboard Content -->
  <div class="dashboard-content">
            
            @if(session('message'))
               {{session('message')}}
            @endif
            
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <a href="#" data-url="{{route('showusers')}}" class="stat-card dynamic-link">
                        <div class="stat-card">
                            <i class="fas fa-users"></i>
                            <h3>{{$usercount}}</h3>
                            <p>Total Users</p>
                        </div>
                    </a>
                    <a href="#" data-url="{{route('showorganization',['id' => 1])}}" class="stat-card dynamic-link">
                    @if($waitingorg > 0)
                    <div class="notifications">
                            <span class="notification-badge">{{$waitingorg}}</span>
                        </div>
                    @endif
                        <div class="stat-card">
                            <i class="fas fa-building"></i>
                            <h3>{{$orgcount}}</h3>
                            <p>Organizations Pending</p>
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
                        <a href="#" data-url="{{route('showusers')}}" class="more-button dynamic-link">View All Users</a>
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
                                    <span class="org-members">{{$org->org_id}}</span>
                                </div>
                                @if ($org->is_approved ==='approved')
                                     <div class="user-status">
                                       
                                         <span class="status-dot active"></span>
                                         <span class="text-success">Approved</span>
                                     </div>
                                 @elseif($org->is_approved ==='waiting')
                                     <div class="user-status">
                                     <span class="status-dot waiting"></span>
                                     <span class="text-warning">waiting</span>
                                     <a href="#" data-url="{{route('Orgdetials',['id' => $org->org_id])}}" class="btn btn-warning dynamic-link" role="button" >View</a>

                                     </div>
                                 @else
                                  <div class="user-status">
                                  <span class="status-dot primary"></span>
                                  <span class="text-warning">Ideal</span>
                                     <a href="{{route('Orgdetials',['id' => $org->org_id])}}" class="btn btn-primary" role="button" >View</a>
                                     </div>

                                 @endif
                            </div>
                          
                            @endforeach
                        </div>
                        <a href="#" data-url="{{route('showorganization',['id' => 0])}}" class="more-button dynamic-link">View All Organizations</a>
                    </div>
                </div>
            </div>