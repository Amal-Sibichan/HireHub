
$(document).ready(function() {

    $('#Educationform').on('submit',function(e){
       e.preventDefault();
       jQuery.ajax({
           url:"{{route('store.edu')}}",
           data:jQuery('#Educationform').serialize(),
           type:'post',
           success:function(result){
               $('#educationmodel').modal('hide');
               setTimeout(() => {
                   window.location.reload();
               }, 1000);   
               $('#message').html('<div class="alert alert-success">'+result.success+'</div>');
               
               
           }
       })
   });
    
});