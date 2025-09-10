
<table id="jobs-table" data-source="{{ route('Emp.jobs') }}">
  <thead>
    <tr><th>ID</th><th>Job Title</th><th>Due</th><th>created</th><th>Actions</th></tr>
  </thead>
</table>

<script>
$(document).ready(function() {
  $('#jobs-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: { url: $('#jobs-table').data('source') },
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
    let jid=$(this).data("id");
      if(jid){
        $.get("{{ route('Emp.apppage') }}", function(viewHtml) {
          $('#content-area').html(viewHtml);
          $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: { url: '/applications/' + jid },
            columns: [
              { data: 'app_id' },
              { data: 'job_title' },
              { data: 'user_name' },
              { data: 'email' },
              { data: 'action', orderable: false, searchable: false },
            ],
          });
        });
      }
  });


  $(document).on('click', '#back', function(e) {
  e.preventDefault();
  
  // Reload the jobs table view
  $.get("{{ route('Emp.showjobs') }}", function(viewHtml) {
    $('#content-area').html(viewHtml);
  });
});

</script>
