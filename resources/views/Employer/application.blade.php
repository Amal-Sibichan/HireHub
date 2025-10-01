<button id="back" class="btn btn-secondary mb-3">←Back</button>
<table id="users-table">
  <thead>
    <tr><th>ID</th><th>Job Title</th><th>Name</th><th>Email</th><th>Actions</th></tr>
  </thead>
</table>
<script>
  $(document).on('click','#applicants',function(e){
    e.preventDefault();
    let id=$(this).data("id");
    let jobId = $(this).data("job");
    $.get("/Applicants/"+id+"/"+jobId, function(viewHtml) {
      $('#content-area').html(viewHtml);
    });

  })
</script>