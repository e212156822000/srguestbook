<?php
session_start();
include("check_session.php");
if(isset($_SESSION["login"])) {
	if(check_session()) {
		header("Location:logout.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="pure.min.css" />
	<script src="jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#submit").click(function(){
				event.preventDefault();
				$.ajax({
					url: "change_password.php",
					type: "POST",
					data:{ old_password: $("#old_password").val(), new_password: $("#new_password").val(), new_password_conf: $("#new_password_conf").val() },
					success: function(msg){
						console.log(msg);
						$("#mes").prepend(msg);
					}
				});
			});
		});
	</script>
</head>
<body>
	<div id="mes"></div>
	<form class="pure-form pure-form-aligned" method="post">
	    <fieldset>
	        <div class="pure-control-group">
	            <label> Hello </label> <?php echo $_SESSION['username'];?>
	        </div>
	        <div class="pure-control-group">
	            <label> Change Password: </label>
	        </div>
	        <div class="pure-control-group">
	            <label for="password">Old Password</label>
	            <input id="old_password" type="password" placeholder="Old Password">
	        </div>
  	        <div class="pure-control-group">
	            <label for="password">New Password</label>
	            <input id="new_password" type="password" placeholder="New Password">
	        </div>
	        <div class="pure-control-group">
	            <label for="password">Password Confirm</label>
	            <input id="new_password_conf" type="password" placeholder="Password Again">
	        </div>

	        <div class="pure-controls">
	            <button id="submit" type="submit" class="pure-button pure-button-primary" >Submit</button>
	        </div>
	    </fieldset>
	</form>

</body>
</html>