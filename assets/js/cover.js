$(document).ready(function() {

	
	$("#join_in").click(function () {
		// fade in and fade out...
		$("#intro_part").fadeOut("slow", function(){
			$(".login_box").fadeIn("slow");
		});
	});
});