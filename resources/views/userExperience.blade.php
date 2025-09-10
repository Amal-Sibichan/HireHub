
        <div class="edit-form">
            <form class="needs-validation" novalidate action="" method='post' enctype="multipart/form-data" id="Experienceform">
                @csrf
    
                <div class="form-section">
                    <h1 class="section-title">Experience</h1>
                    <div id="experienceList">
                        <div class="experience-item">
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" id="title" name="title">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" id="company" name="company">
                            @error('company')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="startDate">Start Date</label>
                                <input type="date" id="startDate" name="expStart">
                            @error('startDate')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="endDate">End Date</label>
                                <input type="date" id="endDate" name="expEnd">
                            @error('endDate')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" placeholder="Ex:" rows="3"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
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

 $('#Experienceform').on('submit',function(e){
    e.preventDefault();
    $('.text-danger').text('');
    jQuery.ajax({
        url:"{{route('store.exp')}}",
        data:jQuery('#Experienceform').serialize(),
        type:'post',
        success:function(result){
            $('#model').modal('hide');
            $("#user-content").load("{{ route('user.profile') }}");
            setTimeout(function() {
                $('#message').html('<div class="alert alert-success">'+result.success+'</div>').fadeOut('slow'); 
            }, 1000);

        },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    // Loop through each error and display it below the field
                    $.each(errors, function(key, value) {
                        // Find the input field by name and show the error below it
                        $(`[name="${key}"]`).after(`<span class="text-danger">${value[0]}</span>`);
                    });
                }
            }
        })
});
});
</script>