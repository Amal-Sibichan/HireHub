$(document).ready(function(){

	$("#form-card").load(loginroute.login);
	
	$(document).on('click','.form-link',function(e){
	e.preventDefault();
	let url=$(this).data("url");
	if(url){
	$("#form-card").load(url);
	}
	});
	
});