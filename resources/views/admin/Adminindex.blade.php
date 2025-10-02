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
        <p>{{$jobcount}}</p>
      </div>
      </a>
      <div class="card">
        <h3>Companies</h3>
        <p>{{$orgcount}}</p>
      </div>
      <div class="card">
        <h3>Users</h3>
        <p>{{Auth::user()->count()}}</p>
      </div>
      <div class="card">
        <h3>Admins</h3>
        <p>{{$admincount}}</p>
      </div>
    </section>
    <div id="addmessage"></div>
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
        <form id="addadmin">
          @csrf
          <label for="name">Full Name</label>
          <input type="text" name="name" id="name" placeholder="Enter name" required>
          @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror

          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter email" required>
          @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror

          <label for="pass">Password</label>
          <input type="password" name="pass" id="pass" placeholder="Enter password" required>
          @error('admin_pass')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <button type="submit">Add Admin</button>
        </form>
      </div>
    </section>
    </div>

<script type="text/javascript">
$(document).on('submit', '#addadmin', function(e){
    e.preventDefault();
    $('.text-danger').remove();

    let formData = new FormData(this);

    $.ajax({
        url: "{{route('addadmin')}}",
        data: formData,
        type: 'post',
        processData: false,
        contentType: false,
        success: function(result){
            $('#addmessage').stop(true, true).hide().html('');
                $('#addmessage').html('<div class="alert alert-success">'+result.success+'</div>').fadeIn();
                $('#addadmin')[0].reset(); 
             $('html, body').animate({
                        scrollTop: $('#addmessage').offset().top - 20
                    }, 500);
            setTimeout(function() {
                $('#addmessage').fadeOut('slow'); // or .slideUp('slow')
            }, 1000); 


        },
        error: function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`[name="${key}"]`).after(`<span class="text-danger">${value[0]}</span>`);
                });
                $('html, body').animate({
                    scrollTop: $('.text-danger').offset().top - 20
                }, 500);
            }
        }
    });
});

</script>