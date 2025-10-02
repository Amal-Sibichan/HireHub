<div class="userdash-container">
    <!-- User Header -->
    <div class="userdash-header">
      <img src="{{ asset('storage/'.$user->image) }}" alt="User Avatar" class="userdash-avatar">
      <div>
        <div class="userdash-name">{{ $user->name }}</div>
        <div class="userdash-role">Registered {{$user->Role}}</div>
      </div>
    </div>

    <!-- User Details -->
    <div class="userdash-details">
      <div><strong>Email:</strong>{{$user->email}}</div>
      <div><strong>Phone:</strong>{{$user->phone}}</div>
      <div><strong>Address:</strong> {{$user->city}}, {{$user->state}}</div>
      <div><strong>Joined:</strong> {{$user->created_at->toFormattedDateString()}}</div>
      <div><strong>Status:</strong> Active</div>
      <div><strong>Total Applications:</strong> {{$appcount}}</div>
    </div>

    <!-- User Activities -->
    <div class="userdash-activities">
      <h3>Recent Activities</h3>
      <ul>
        @foreach($applications as $application)
        <li>
          <span>Applied for <strong>{{$application->jobs->name}}</strong> at {{$application->organizations->name}}</span>
          <span class="userdash-activity-time">{{$application->created_at->diffForHumans()}}</span>
        </li>
        @endforeach
      </ul>
    </div>
  </div> 