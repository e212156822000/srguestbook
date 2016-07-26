<?php
if($_POST['delete_id'] != NULL){
	$servername = "140.115.189.133";
	$username = "root";
	$password = "0000";
	$dbname = "test";

	try 
	{
	    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
	    //echo wrong messenge 
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //delete sql and execute
    	$delsql = "DELETE FROM comments WHERE id='".$_POST['delete_id']."'";
		$conn->exec($delsql);
		//echo id for hiding
   		echo $_POST['delete_id'];
 
	}
	catch(PDOException $e)
	{
    	echo "deleted failed: " . $e->getMessage();
	}
}
else
{
	echo "id is NULL! ";
}

?>
