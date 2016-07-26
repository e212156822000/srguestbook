<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['username']);
unset($_SESSION['login_time']);
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
			<form method="post" >
				<div class="pure-control-group">
					<label>Username: </label><input type="text" name="username" id="username"/><br>
				</div>
				<div class="pure-control-group">
					<label>Password: </label><input type="password" name="password" id="password"/><br>
				</div>
				<div class="pure-controls">
					<button type="submit" id="submit" class="pure-button pure-button-primary">Submit</button>
				</div>
			</form>
		</fieldset>
	</form>
	<p id="information"></p>
</body>
</html>