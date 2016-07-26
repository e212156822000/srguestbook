	$(document).ready(function(){
		$("#submit").click(function(){
			event.preventDefault();
			$.ajax({
				url: "add_post.php",
				type: "POST",
				data:{ title: $("#title").val() , comment: $("#comment").val() },//,session: $("#delseed").val()
				success: function(msg){
					$("#content").prepend(msg);
					$("#title").val('');
					$("#comment").val('');
				}
			});
		});

		$(document).on("click", ".delete" , function() {
			event.preventDefault();
			$.ajax({
				url: "delete_post.php",
				type: "POST",
				data:{ delete_id: $(this).parent().parent().attr('id')  }, //,session: $("#delseed").val()
				success: function(msg){
					$("#"+ msg ).hide(1000);
					$("#reply_board_"+msg).hide(1000);
				}
			});
		});
		$(document).on("click", ".edit_submit_button" , function() {
			event.preventDefault();
			$.ajax({
				url: "edit_post.php",
				type: "POST",
				data:{ comment_id: $(this).parent().parent().parent().parent().next(".reply_board").prev(".board").attr('id') , edit_comment: $("#edit_textarea_"+ $(this).parent().parent().parent().parent().next(".reply_board").prev(".board").attr('id')).val() }, //,session: $("#delseed").val()
				success: function(msg){
					var result = $.parseJSON(msg);
					$("#post_text_"+result[0]).html(result[1]);
								
				}
			});
		});
	
		$(document).on("click", ".edit" , function() {
			var comment_id = $(this).parent().attr('id');
			var origin_post = $("#post_text_"+ $(this).parent().attr('id') ).text();
			 $("#edit_div_"+ comment_id ).toggle();
		   /*
		     if ($("#post_text_"+ comment_id ).text() == origin_post) {
	            $("#post_text_"+ comment_id ).text("edit mode!");
	     	 }
	         else {
          		 $("#post_text_"+ comment_id ).text("hi");
    		 }
    		 */
		});

		$(document).on("click", ".reply_submit" , function() {
			event.preventDefault();
			$.ajax({
				url: "add_reply.php",
				type: "POST",
				data:{ comment_id: $(this).parent().parent().prev().attr('id') , reply: $("#reply_"+ $(this).parent().parent().prev().attr('id') ).val()  }, //,session: $("#delseed").val()
				success: function(msg){
					var result = $.parseJSON(msg);
					$("#append_use_"+result[0]).append(result[1]);
					$("#reply_"+result[0]).val('');
				}
			});
		});
		$(document).on("click", ".reply" , function(){
			$(this).parent().parent().toggleClass("border").next('div').slideToggle("slow");
			$(this).parent().toggleClass("border").next('div').slideToggle("slow");
		});
	});
