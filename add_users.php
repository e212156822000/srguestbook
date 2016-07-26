<?php
if( $_POST['username'] != NULL && $_POST['password'] != NULL && $_POST['email'] != NULL && $_POST['password_conf'] == $_POST['password']){

		$servername = "140.115.189.133";
		$username = "root";
		$password = "0000";
		$dbname = "test";

		try 
		{
		    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
		    //echo wrong messenge 
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$insql = "INSERT INTO `users` (`id`, `email`, `password`, `username`) 
			VALUES ( NULL, '".$_POST['email']."','".$_POST['password']."','".$_POST['username']."')";
			$conn->exec($insql);

			echo "user created! ";
			echo '<meta http-equiv="refresh" content="0; URL=login.php">';

		}
		catch(PDOException $e)
		{
	    	echo "User added failed: " . $e->getMessage();
		}
}
else if($_POST['password_conf'] != $_POST['password']){
	echo "confirm error! " ;
}else{
	echo"Please input some info ";
}

?>
