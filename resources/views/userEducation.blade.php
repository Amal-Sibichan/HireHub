
        <div class="edit-form">
            <form class="needs-validation" novalidate action="" method='post' enctype="multipart/form-data" id="Educationform">
            @csrf
                <div class="form-section">
                    <input type="hidden" name="user_id" value="{{encrypt($user->user_id)}}">
                    <h1 class="section-title">Education</h1>
                    <div id="educationList">
                        <div class="education-item">
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" id="lev" name="lev" required>
                            </div>
                             @error('lev')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="institute">Institution</label>
                                <input type="text" id="inst" name="inst" required>
                            </div>
                                @error('inst')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror


                                 <div class="form-group">
                                <label for="course">Course</label>
                                <input type="text" id="course" name="course" required>
                            </div>

                            @error('course')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="eduStartDate">Start Date</label>
                                <input type="date" id="eduStart" name="eduStart" required>
                            </div>
                            @error('eduStart')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror


                            <div class="form-group">
                                <label for="eduEndDate">End Date</label>
                                <input type="date" id="eduEnd" name="eduEnd" placeholder="keep empty if still studying">
                            </div>
                            @error('eduEnd')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                        </div>
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

 $('#Educationform').on('submit',function(e){   
    $('.text-danger').text('');
    e.preventDefault();
    jQuery.ajax({
        url:"{{route('store.edu')}}",
        data:jQuery('#Educationform').serialize(),
        type:'post',
        success:function(result){
            $('#model').modal('hide');
            $("#user-content").load("{{ route('user.profile') }}");
            setTimeout(function() {
                $('#message').html('<div class="alert alert-success">'+result.success+'</div>').fadeOut('slow'); 
            }, 1000);

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