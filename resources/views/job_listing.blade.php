
<table id="jobs-list" data-source="{{ route('Find.Jobs') }}">
  <thead>
    <tr><th>ID</th><th>Job Title</th><th>Due</th><th>created</th><th>Actions</th></tr>
  </thead>
</table>

<script>
$(document).ready(function() {
  $('#jobs-list').DataTable({
    processing: true,
    serverSide: true,
    ajax: { url: $('#jobs-list').data('source') },
    columns: [
      { data: 'j_id' },
      { data: 'name' },
      { data: 'due' },
      { data: 'created_at' },
      {data:'action',oderable:false,searchable:false},
      
    ],
  });
});

$(document).on('click','#viewbtn',function(e){
    e.preventDefault();
    let id=$(this).data("id");
    $.get("/job_details/"+id, function(viewHtml) {
      $('#user-content').html(viewHtml);
    });

});
</script>
