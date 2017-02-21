$(document).ready(function() {

	
	$("#join_in").click(function () {
		// body...
		$("#intro_part").slideUp("slow", function(){
			$(".login_box").slideDown("slow");
		});
	});
});