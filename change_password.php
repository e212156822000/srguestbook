<?php
session_start();
if( $_POST['old_password'] != NULL && $_POST['new_password_conf'] != NULL && $_POST['new_password'] !=NULL && $_POST['new_password_conf'] ==  $_POST['new_password'] )
{

		$servername = "140.115.189.133";
		$username = "root";
		$password = "0000";
		$dbname = "test";

		try 
		{
		    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
		    //echo wrong messenge 
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$insql = 'UPDATE `users` SET `password` = "'.$_POST['new_password'].'" WHERE `username` ="'.$_SESSION['username'].'"';
			$conn->exec($insql);
	
			echo "password changed! ";

		}
		catch(PDOException $e)
		{
	    	echo "changed failed: " . $e->getMessage();
		}
}
else if($_POST['new_password_conf'] != $_POST['new_password']){
	echo "confirm error! " ;
}else{
	echo"Please input some info ";
}

?>
