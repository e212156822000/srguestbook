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
					url: "add_users.php",
					type: "POST",
					data:{ username: $("#username").val() , password: $("#password").val(), password_conf: $("#password_conf").val(), email: $("#email").val() },
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
				<label>Username: </label>
				<input id="username" type="text" name="username" placeholder="Username" /><br>
			</div>
	        <div class="pure-control-group">
	            <label for="password">Password</label>
	            <input id="password" type="password" placeholder="Password">
	        </div>

	        <div class="pure-control-group">
	            <label for="password">Password Confirm</label>
	            <input id="password_conf" type="password" placeholder="Password Again">
	        </div>

	        <div class="pure-control-group">
	            <label for="email">Email Address</label>
	            <input id="email" type="email" placeholder="Email Address">
	        </div>
	        <div class="pure-controls">
	            <button type="submit" class="pure-button pure-button-primary" id="submit">Submit</button>
	        </div>
	    </fieldset>
	</form>

</body>
</html>