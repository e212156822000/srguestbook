<?php
if($_POST['comment_id'] != NULL && $_POST['edit_comment'] != NULL){
	
	$servername = "140.115.189.133";
	$username = "root";
	$password = "0000";
	$dbname = "test";

	try 
	{
	    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
	    //echo wrong messenge 
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $editsql = 'UPDATE `comments` SET `comment`="'.$_POST['edit_comment'].'" WHERE id ="'.$_POST['comment_id'].'"';
	    $conn->exec($editsql);
	   	echo json_encode(array($_POST['comment_id'], $_POST['edit_comment']));
		
 	
 	}
	catch(PDOException $e)
	{
    	echo "show failed: " . $e->getMessage();
	}
}
else
{
	echo 'id is NULL! '.$_POST['comment_id'].',comment is NULL'.$_POST['edit_comment'];
}

?>
