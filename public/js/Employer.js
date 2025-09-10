$(document).ready(function(){

    $("#content-area").load(eroute.dash);

$(document).on('click','.nav-link',function(e){
  e.preventDefault();
  let url=$(this).data("url");
  if(url){
    $("#content-area").load(url);
  }
});

});
