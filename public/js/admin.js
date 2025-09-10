
$(document).ready(function(){

    $("#admin-content").load(eroute.admindash);

$(document).on('click','.dynamic-link',function(e){
  e.preventDefault();
  let url=$(this).data("url");
  if(url){
    $("#admin-content").load(url);
  }
});

});






