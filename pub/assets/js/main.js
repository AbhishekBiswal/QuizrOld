$(document).ready(function(){

	/*ajax*/
	$("form.ajax").submit(function(e){
		e.preventDefault();
		var action = $(this).attr("action");
		var postData = $(this).serialize();
		$.ajax({
			url: action,
			type: "POST",
			data: postData,
			cache: false,
			success: function(msg){
				$("p.submitinfo").html(msg);
			}
		})
	})

	/*modal*/
	$(".fire-modal").click(function(e){
		e.preventDefault();
		var href = $(this).attr("href");
		alert(href);
		var id = $(this).attr("id");
		$("div#"+id).load(href, function(){
			// load function:
			$("a.close-modal").click(function(e){
				e.preventDefault();
				$("div#"+id).fadeOut();
				$("#bg").fadeOut();
			});
			$("#bg").click(function(){
				$("div#"+id).fadeOut();
				$("#bg").fadeOut();
			})
		});
		$("#bg").fadeIn();
		$("div#"+id).fadeIn();
	});


}); // ready