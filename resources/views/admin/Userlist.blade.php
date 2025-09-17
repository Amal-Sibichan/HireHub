
<table id="users-table" data-source="{{ route('Users') }}">
  <thead>
    <tr><th>ID</th><th>User Name</th><th>Email</th><th>created</th><th>Actions</th></tr>
  </thead>
</table>

<script>
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
