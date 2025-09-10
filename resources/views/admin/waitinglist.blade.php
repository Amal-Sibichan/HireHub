
<table id="waitinglist-table" data-source="{{ route('waitinglist') }}">
  <thead>
    <tr><th>ID</th><th>Organization</th><th>Email</th><th>created</th><th>Actions</th></tr>
  </thead>
</table>

<script>
$(document).ready(function() {
  $('#waitinglist-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: { url: $('#waitinglist-table').data('source') },
    columns: [
      { data: 'org_id' },
      { data: 'name' },
      { data: 'email' },
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
          $('#admin-content').html(viewHtml);
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
  $.get("{{ route('showusers') }}", function(viewHtml) {
    $('#admin-content').html(viewHtml);
  });
});

</script>
