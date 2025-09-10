
    <div class="container">
        <div class="edit-form">
            <h1>Edit Profile</h1>
            
            <form class="needs-validation" novalidate action="{{route('user.update')}}" method='post' enctype="multipart/form-data" id="profileform">
                @csrf
                <div class="form-section">
                    <h2 class="section-title">Basic Information</h2>
                    <input type="hidden" name="user_id" value="{{encrypt($user->user_id)}}">
                    <div class="profile-photo-upload">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Photo" class="current-photo">
                        <div>
                            <input type="file" id="photoInput" class="photo-input" name="img" accept="image/*">
                            <label for="photoInput" class="btn">Change Photo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Contact</label>
                        <input type="number"  id="phone" name="pho" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="location">Address</label>
                        <textarea id="address" name="add" >{{ $user->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">City</label>
                        <input type="text"  id="city" name="city" value="{{ $user->city }}">
                    </div>
                    <div class="form-group">
                        <label for="location">State</label>
                        <input type="text"  id="state" name="state" value="{{ $user->state }}">
                    </div>
                    <div class="form-group">
                        <label for="location">Resume</label>
                        <input type="file"  id="resume" name="res" value="{{ $user->resume }}">
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">About</h2>
                    <div class="form-group">
                        <label for="headline">Profession</label>
                        <input type="text" id="pro" placeholder="Ex:Senior Software Engineer" name="pro" value="{{ $user->Prof }}">
                    </div>
                    <div class="form-group">
                        <label for="summary">About</label>
                        <textarea id="summary" name="about"   rows="4">{{ $user->About }}</textarea>
                    </div>
                </div>
                <div class="form-section">
                    <h2 class="section-title">Skills</h2>
                    <!-- <div class="form-group">
                        <input type="text" id="skillInput" placeholder="Enter skills and press Enter">
                    </div> -->
                    <div id="skillList" class="form-group">
                        <select class="form-select" name="skill_id" required>
                            <option value="">Select a skill</option>
                            @foreach($allSkills as $skill)
                                <option value="{{ $skill->s_id }}
                                    @if($user->skills->contains($skill)) selected @endif
                                ">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Save Changes</button>
                    <button type="button" class="btn btn-cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Cancel</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
$(document).ready(function() {

 $('#profileform').on('submit',function(e){
    $('.text-danger').text('');
    e.preventDefault();
    jQuery.ajax({
        url:"{{route('user.update')}}",
        data:jQuery('#profileform').serialize(),
        type:'post',
        success:function(result){
            $('#model').modal('hide');
            setTimeout(function() {
                $('#message').html('<div class="alert alert-success">'+result.success+'</div>').fadeOut('slow'); 
            }, 500);
            $("#user-content").load("{{ route('user.profile') }}");
        },
        error:function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`[name="${key}"]`).after(`<span class="text-danger">${value[0]}</span>`);
                });
            }
        }
    })
});
})
</script>

