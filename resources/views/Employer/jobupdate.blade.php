
        <div class="edit-form">
        <div id="message"></div> 
            <h1>Post new Job</h1>
            <form class="needs-validation" novalidate action="" method='post' enctype="multipart/form-data" id="Jobaddform">
                @csrf
                <div class="form-section">
                    <h2 class="section-title">Basic Information</h2>
                    
                    <div class="form-group">
                        <label for="JobName">Job Role</label>
                        <input type="text" id="name" name="name" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descriptin">Job Description</label>
                        <textarea name="desc" id="desc" required></textarea>
                        @error('desc')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="skill">Preferred skills</label>
                        <textarea name="skill" id="skill"></textarea>
                        @error('skill')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="education">Educational Experience/Educational requerments</label>
                        <textarea name="edu" id="edu" placeholder="specify skills seperated by commas"></textarea>
                        @error('edu')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">City</label>
                        <input type="text"  id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>  
                        <input type="text" id="salary" name="salary" class="form-control">
                        @error('salary')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category">
                            <option value="IT">IT</option>
                            <option value="Health">Health</option>
                            <option value="Education">Education</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Sales">Sales</option>
                            <option value="HR">HR</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Job Type</label>
                        <select name="type" id="type">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due">Due Date</label>
                        <input type="date" id="due" name="due" class="form-control">
                        @error('due')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{route('Emp.dashboard')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>

<script type="text/javascript">
$(document).ready(function() {

 $('#Jobaddform').on('submit',function(e){
    $('.text-danger').remove();
    e.preventDefault();
    jQuery.ajax({
        url:"{{route('Emp.job.add')}}",
        data:jQuery('#Jobaddform').serialize(),
        type:'post',
        success:function(result){
            setTimeout(function() {
                $('#message').html('<div class="alert alert-success">'+result.success+'</div>'); 
            }, 1000);
             $('#Jobaddform')[0].reset(); 
             $('html, body').animate({
                        scrollTop: $('#message').offset().top - 20
                    }, 500);
            setTimeout(function() {
                $('#message').fadeOut('slow'); // or .slideUp('slow')
            }, 500);   
           
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