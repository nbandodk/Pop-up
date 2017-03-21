$(document).ready(function() {

	//on click signup, hide login and show registration form
	$("#signup").click(function () {
		// body...
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});

	//on click sign in, hide reg and show login form
	$("#signin").click(function () {
		// body...
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});
});