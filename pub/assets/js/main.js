$(document).ready(function(){

	/*ajax*/
	$("form.ajax").submit(function(e){
		e.preventDefault();
		var oldVal = $("form input[type=submit]").val();
		$("form input[type=submit]").val("Please Wait.");
		var action = $(this).attr("action");
		var postData = $(this).serialize();
		$.ajax({
			url: action,
			type: "POST",
			data: postData,
			cache: false,
			success: function(msg){
					$("form input[type=submit]").val(oldVal);
					$("p.submitinfo").html(msg).fadeIn();
			}
		})
	})

	$(".quiz-option").click(function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		var id = $(".q").val();
		var quizData = "option="+id+"&id="+id;
		$.ajax({
			url: "sub.php",
			type: "post",
			data: quizData,
			cache: false,
			success: function(got)
			{
				$("#quiz-area").html(got);
			}
		})
	});

	// add-hint:
	$("a.add-image").click(function(){
		if($("a.add-image").hasClass("add-image"))
		{
			$(this).removeClass("add-image");
			$(this).addClass("remove-image");
			$(this).html("Remove Image");
			$("div.add-image").slideDown();
		}
		else
		{
			$("q-image").val("");
			$(this).removeClass("remove-image");
			$(this).addClass("add-image");
			$(this).html("Add Image");
			$("div.add-image").slideUp();
		}
	}); // button add-hint click

	$("a.add-hint").click(function(){
		if($("a.add-hint").hasClass("add-hint"))
		{
			$(this).removeClass("add-hint");
			$(this).addClass("remove-hint");
			$(this).html("Remove Hint");
			$("div.add-hint").slideDown();
		}
		else
		{
			$("q-hint").val("");
			$(this).removeClass("remove-hint");
			$(this).addClass("add-hint");
			$(this).html("Add Hint");
			$("div.add-hint").slideUp();
		}
	}); // button add-hint click

	// dropdown
	$("a.dropit").click(function(e){
		e.preventDefault();
		if($("li.dropit").hasClass("open"))
		{
			$("li.dropit").removeClass("open");
			$("li.dropit ul").fadeOut('fast');
		}
		else
		{
			$("li.dropit").addClass("open");
			$("li.dropit ul").fadeIn('fast');
		}
	});

	$(".view-hint-button").click(function(e){
		e.preventDefault();
		var id = $(this).attr("id");
		var hintData = "id="+id;
		$.ajax({
			url: '/ajax/hint.php',
			data : hintData,
			type : 'post',
			success : function(result)
			{
				$(".area-hint").html(result);
			}
		})
	})

	$(".leaderb tr:even").addClass("tr-even");
	$(".browse-quizzes li:even").addClass("br-even");


}); // ready