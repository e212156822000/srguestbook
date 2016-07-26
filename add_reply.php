<?php
if( $_POST['reply'] != NULL && $_POST['comment_id'] != NULL ) 
{
	session_start();
	$servername = "140.115.189.133";
	$username = "root";
	$password = "0000";
	$dbname = "test";

	try 
	{
	    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
	    //echo wrong messenge
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //select user's data , later to insert into comments as user_id
 	  
 	    $sql = "SELECT id FROM users WHERE username = '".$_SESSION['username']."'" ;
		foreach ($conn->query($sql) as $row) {
	 
			$insql = "INSERT INTO `replies` (`id`, `comment_id`, `user_id`, `reply`, `time`) 
			VALUES ( NULL, '".$_POST['comment_id']."','".$row['id']."','".$_POST['reply']."',NULL)";
			$conn->exec($insql);
	
	    }
	    //echo reply to main
	    $max_reply_id = $conn->lastInsertId();
		$repsql = "SELECT time  FROM replies WHERE id ='".$max_reply_id."'";
		foreach ($conn->query($repsql) as $rep) {

			$reply =
				 '<div id="reply_single_'.$max_reply_id.'" class="reply_single">
		     		<div class="reply_author">'.$_SESSION['username'].'</div>
		     		<div class="reply_text">'.$_POST['reply'].'</div>
		     		<div class="reply_time">'.$rep['time'].'</div>
			  	  </div>';
		
		}
	   	echo json_encode(array($_POST['comment_id'], $reply));


	}
	catch(PDOException $e)
	{
    	echo "Insert failed: " . $e->getMessage();
	}

}
else
{
echo "Please input some text.";
}
?>
