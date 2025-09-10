


$(document).ready(function(){

    $("#user-content").load(routes.index);

$(document).on('click','.dynamic-link',function(e){
  e.preventDefault();
  let url=$(this).data("url");
  if(url){
    $("#user-content").load(url);
  }
});

});



$(document).on('click', '#addedubutton', function(e) {
    // e.preventDefault();
    // var url = $(this).attr('href');
    $.ajax({
        url: routes.edu_url,
        method: 'get',
        success: function(data) {
            $('#DataContainer').html(data);
            $('#model').modal("show");
        },
        error: function() {
            alert('An error occurred while loading the content.');
        }
    });
});



$(document).on('click', '#addexpbutton', function(e) {
    // e.preventDefault();
    // var url = $(this).attr('href');
    $.ajax({
        url: routes.exp_url,
        method: 'get',
        success: function(data) {
            $('#DataContainer').html(data);
            $('#model').modal("show");
        },
        error: function() {
            alert('An error occurred while loading the content.');
        }
    });
});

$(document).on('click', '#profilebtn', function(e) {
    // e.preventDefault();
    // var url = $(this).attr('href');
    $.ajax({
        url: routes.prof_url,
        method: 'get',
        success: function(data) {
            $('#DataContainer').html(data);
            $('#model').modal("show");
        },
        error: function() {
            alert('An error occurred while loading the content.');
        }
    });
});





