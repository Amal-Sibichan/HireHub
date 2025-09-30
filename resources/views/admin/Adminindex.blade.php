<div class="dashboard-container">


    <!-- Top Bar -->
    <header class="topbar">
      <h2>Admin Dashboard</h2>
      <div class="topbar-right">
        <i class="fas fa-bell"></i>
        <img src="admin-avatar.png" alt="Admin" class="admin-avatar">
      </div>
    </header>

    <!-- Dashboard Overview -->
    <section class="overview">
     <a  href="#" data-url="{{route('showorganization',['id' => 1])}}" class=" dynamic-link">
      <div class="card">
        <h3>Total Jobs</h3>
        <p>145</p>
      </div>
      </a>
      <div class="card">
        <h3>Companies</h3>
        <p>{{$orgcount}}</p>
      </div>
      <div class="card">
        <h3>Users</h3>
        <p>{{$usercount}}</p>
      </div>
      <div class="card">
        <h3>Admins</h3>
        <p>4</p>
      </div>
    </section>

    <!-- Recent Activity + Add Admin -->
    <section class="dashboard-sections">
      <div class="activity">
        <h3>Recent Activity</h3>
        <ul>
        @forelse($activities as $activity)
        <li class="list-group-item">
        {{ $activity['title'] }}
        <br>
        <small class="text-muted">{{ $activity['time']->diffForHumans() }}</small>
        </li>
        @empty
          <li>No recent activity</li>
        @endforelse
        </ul>
      </div>

      <div class="add-admin">
        <h3>Add New Administrator</h3>
        <form>
          <label for="admin-name">Full Name</label>
          <input type="text" id="admin-name" placeholder="Enter name" required>

          <label for="admin-email">Email</label>
          <input type="email" id="admin-email" placeholder="Enter email" required>

          <label for="admin-pass">Password</label>
          <input type="password" id="admin-pass" placeholder="Enter password" required>

          <button type="submit">Add Admin</button>
        </form>
      </div>
    </section>
    </div>