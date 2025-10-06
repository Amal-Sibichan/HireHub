<div class="hh-schedule-form-container">
    <div id="formmessage"></div>
    <h1 class="hh-form-title">Send Mail</h1>
    
    <form class="hh-schedule-form" action="" method='post' id="acceptform" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mail" id="mail" value="{{ $mail }}">
        
        <div class="hh-form-group">
            <label for="category" class="hh-form-label">Category</label> 
            <select name="category" id="category" class="hh-form-control hh-form-select">
                <option value="" class="hh-select-option">Select interview type</option>
                <option value="Telephonic" class="hh-select-option">Telephonic Interview</option>
                <option value="Virtual" class="hh-select-option">Virtual Interview (Google Meet/Zoom)</option>
                <option value="Offline" class="hh-select-option">Offline Interview</option>
            </select>
            @error('category')
                <div class="hh-text-danger hh-small">{{ $message }}</div>
            @enderror
        </div>

        <div class="hh-form-row">
            <div class="hh-form-group hh-col-half">
                <label for="date" class="hh-form-label">Date</label>
                <input type="date" name="date" id="date" placeholder="specify date" required class="hh-form-control">
                @error('date')
                    <div class="hh-text-danger hh-small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="hh-form-group hh-col-half">
                <label for="time" class="hh-form-label">Time</label>
                <input type="time" name="time" id="time" placeholder="specify time" required class="hh-form-control">
                @error('time')
                    <div class="hh-text-danger hh-small">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="hh-form-group">
            <label for="link" class="hh-form-label">link</label>
            <input type="text" name="link" id="link" placeholder="specify link or address (optional)" class="hh-form-control">
            @error('link')
                <div class="hh-text-danger hh-small">{{ $message }}</div>
            @enderror
        </div>

        <div class="hh-form-group">
            <label for="description" class="hh-form-label">Description</label>
            <textarea name="description" id="description" placeholder="specify description (optional)" class="hh-form-control hh-form-textarea"></textarea>
            @error('description')
                <div class="hh-text-danger hh-small">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="hh-form-group hh-submit-group">
            <button type="submit" class="hh-btn-schedule">Schedule</button>
        </div>
    </form>
</div>
<script>
    $('#acceptform').on('submit',function(e){
    $('.text-danger').remove();
    e.preventDefault();
    jQuery.ajax({
        url:"{{route('Emp.interviewSchedule',['appid'=>$appid])}}",
        data:jQuery('#acceptform').serialize(),
        type:'post',
        success:function(result){
            alert(result.success);
             $('#acceptform')[0].reset();   
             window.location.href = "{{route('Emp.dashboard')}}"; 
        },
        error:function(xhr){
            if(xhr.status === 422){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    $(`[name="${key}"]`).after(`<span class="hh-text-danger">${value[0]}</span>`);
                });
            }
        }
    })
});
</script>