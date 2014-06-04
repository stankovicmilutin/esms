$(document).ready(function(){
        $(".removePlayerButton").click(function(){
        	var id = $(this).attr("data-plid");
        	$("#playerForRemove").val(id);
        });
});