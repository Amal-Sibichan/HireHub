


$(document).ready(function(){

    $("#user-content").load(routes.index);

$(document).on('click','.dynamic-link',function(e){
  e.preventDefault();
  let url=$(this).data("url");
  if(url){
    $("#user-content").load(url);
  }
});

// Handle Laravel pagination links via AJAX so pages load dynamically
$(document).on('click', '.pagination a', function(e){
  e.preventDefault();
  const url = $(this).attr('href');
  if(url){
    $("#user-content").load(url);
    $('html, body').animate({
        scrollTop: $('#user-content').offset().top - 20
    }, 500);
  }
});

// Intercept job search and filter form submissions to load results via AJAX
$(document).on('submit', '#searchForm, #filterform', function(e){
  e.preventDefault();
  const $form = $(this);
  const url = $form.attr('action');
  const data = $form.serialize();
  if(url){
    $("#user-content").load(url + '?' + data, function(){
      // Scroll to results after load
      $('html, body').animate({
        scrollTop: $('#user-content').offset().top - 20
      }, 400);
    });
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









