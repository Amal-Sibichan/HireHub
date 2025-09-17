<button id="back" class="btn btn-secondary mb-3">←Back</button>
<table id="employers-table" data-source="{{ route('Employers') }}">
  <thead>
    <tr><th>ID</th><th>Organization</th><th>Email</th><th>created</th><th>Actions</th></tr>
  </thead>
</table>

<script>
$(document).ready(function() {
  $('#employers-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: { url: $('#employers-table').data('source') },
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
    let id=$(this).data("id");
    $.get("/Orgdetials/"+id, function(viewHtml) {
      $('#admin-content').html(viewHtml);
    });

});


  $(document).on('click', '#back', function(e) {
  e.preventDefault();
  
  // Reload the jobs table view
  $.get("{{ route('admin.index') }}", function(viewHtml) {
    $('#admin-content').html(viewHtml);
  });
});

</script>
