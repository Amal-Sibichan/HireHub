
<div class="edit-form">
        <div id="formmessage"></div> 
            <h1>Edit Job</h1>
            <form class="needs-validation" novalidate action="" method='post' enctype="multipart/form-data" id="Jobeditform">
                @csrf
                <div class="form-section">          
                    <input type="hidden" name="j_id" value="{{ $job->j_id }}">          
                    <div class="form-group">
                        <label for="JobName">Job Role</label>
                        <input type="text" id="name" name="name" value="{{ $job->name }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <textarea name="desc" id="desc" required>{{ $job->description }}</textarea>
                        @error('desc')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="skill">Preferred skills</label>
                        <textarea name="skill" id="skill" required>{{ $job->skills }}</textarea>
                        @error('skill')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="education">Educational Experience/Educational requerments</label>
                        <textarea name="edu" id="edu" placeholder="specify skills seperated by commas" required>{{ $job->Education }}</textarea>
                        @error('edu')
                         <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location">City</label>
                        <input type="text"  id="city" name="city" value="{{ $job->city }}" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>  
                        <input type="text" id="salary" name="salary" value="{{ $job->salary }}" required>
                        @error('salary')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" >
                            <option value="{{ $job->category }}">{{ $job->category }}</option>
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
                            <option value="{{ $job->type }}" >{{ $job->type }}</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due">Due Date</label>
                        <input type="date" id="due" name="due" value="{{ $job->due }}" class="form-control">
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

 $('#Jobeditform').on('submit',function(e){
    $('.text-danger').remove();
    e.preventDefault();
    let formData = new FormData(this);

    jQuery.ajax({
        url:"{{route('Emp.jobedit.update')}}",
        data:formData,
        processData: false,
        contentType: false,
        type:'post',
        success:function(result){
            $('#formmessage').stop(true, true).hide().html('');
                $('#formmessage').html('<div class="alert alert-success">'+result.success+'</div>').fadeIn();
             
             $('html, body').animate({
                        scrollTop: $('#formmessage').offset().top - 20
                    }, 500);
            setTimeout(function() {
                $('#formmessage').fadeOut('slow'); // or .slideUp('slow')
            }, 1000);   
           
        },
        error:function(xhr){
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
    })
});
})
</script>