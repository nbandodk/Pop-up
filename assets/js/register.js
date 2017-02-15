$(document).ready(function() {
	$(".signup").click(function() {
		$(".first").slideUp("slow", function() {
			$(".second").slideDown("slow");
		});
		
	});
});

$(document).ready(function() {
	$(".signin").click(function() {
		$(".second").slideUp("slow", function() {
			$(".first").slideDown("slow");
		});
	});
});