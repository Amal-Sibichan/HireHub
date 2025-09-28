        
        <div class="edit-form">
            <h1>Edit Profile</h1>
            <form class="needs-validation" novalidate action="" method='post' enctype="multipart/form-data" id="profupdate">
                @csrf
                <div class="form-section">
                    <h2 class="section-title">Basic Information</h2>
                    <input type="hidden" name="org_id" value="{{encrypt($org->org_id)}}">
                    <div class="profile-photo-upload">
                        <img src="{{ asset('storage/' . $org->logo) }}" alt="Profile Photo" class="current-photo">
                        <div>
                            <input type="file" id="photoInput" class="photo-input" name="img" accept="image/*">
                            <label for="photoInput" class="btn">Change Logo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullName">Organization Name</label>
                        <input type="text" id="name" name="name" value="{{ $org->name }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $org->email }}" required>
                        @error('email')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">Contact</label>
                        <input type="number"  id="phone" name="pho" value="{{ $org->phone }} " required>
                        @error('pho')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">Address</label>
                        <textarea id="address" name="add"  required>{{ $org->address }}</textarea>
                        @error('add')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">City</label>
                        <input type="text"  id="city" name="city" value="{{ $org->city }}"  required>
                        @error('city')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">State</label>
                        <input type="text"  id="state" name="state" value="{{ $org->state }}"  required>
                        @error('state')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">Id proof of company</label>
                        <input type="file"  id="identity" name="idty" value="{{ $org->identity }}"  required>
                        @error('idty')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-group">
                        <label for="summary">Discription</label>
                        <textarea id="summary" name="about"   rows="4">{{ $org->description }}</textarea>
                        @error('about')
                           <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Save Changes</button>
                    <a href="#" class="btn btn-cancel" id="cancel">Cancel</a>
                </div>
             </div>
             
               
            </form>
        </div>
  
    <script type="text/javascript">
$(document).ready(function() {

 $('#profupdate').on('submit',function(e){
    $('.text-danger').remove();
    e.preventDefault();
    let formData = new FormData($('#profupdate')[0]);
    jQuery.ajax({
        url:"{{route('Emp.update')}}",
        data:formData,
        
        type:'post',
        processData: false,
        contentType: false,
        success:function(result){
            $('#message').html('<div class="alert alert-success">'+result.success+'</div>'); 
            $('html, body').animate({
                        scrollTop: $('#message').offset().top - 20
                    }, 500);   
            setTimeout(function() {
                $('#message').fadeOut('slow'); // or .slideUp('slow')
            }, 500);
            $('#content-area').load("{{route('Emp.profile')}}");   
        },
        error:function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`[name="${key}"]`).after(`<span class="text-danger">${value[0]}</span>`);
                });
                $('html, body').animate({
                        scrollTop: $('#message').offset().top - 20
                    }, 500);  
            }
        }
    })
});
})
</script>