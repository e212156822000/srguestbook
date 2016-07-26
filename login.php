<?php
session_start();
include("check_session.php");
if(isset($_SESSION['login'])) {
	if(!check_session()) {
		header("Location:main.php");
	} else {
		header("Location:logout.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="pure.min.css" />
	<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
	<script>
	
	$(document).ready(function(){
		$("#submit").on("click", function(){
			event.preventDefault();
			$.ajax({
	            url: "authenticate.php",
	            type: "POST",
	            data: {  username: $("#username").val() , password: $("#password").val()},
	            success: function (data) {
	            	console.log(data);
	                $("#information").prepend(data);
	            }
        	});
		});
	});

	</script>
</head>
<body>
	<form class="pure-form pure-form-aligned" method="post">
	    <fieldset>
				<div class="pure-control-group">
					<label>Username: </label><input type="text" name="username" id="username"/><br>
				</div>
				<div class="pure-control-group">
					<label>Password: </label><input type="password" name="password" id="password"/><br>
				</div>
				<div class="pure-controls">
					<button type="submit" id="submit" class="pure-button pure-button-primary">Submit</button>
				</div>
		</fieldset>
	</form>
	<p id="information"></p>
</body>
</html>