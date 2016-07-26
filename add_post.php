<?php
if( $_POST['title'] != NULL && $_POST['comment'] != NULL )
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
	  
			$insql = "INSERT INTO `comments` (`id`, `user_id`, `title`, `comment`, `time`) 
			VALUES ( NULL, '".$row['id']."','".$_POST['title']."','".$_POST['comment']."',NULL)";
			$conn->exec($insql);
	    }
	    	$max_id = $conn->lastInsertId();
			$comsql = "SELECT time  FROM comments WHERE id ='".$max_id."'";

			foreach($conn->query($comsql) as $com){
			
		   		echo '
				<div class="board"  id="'.$max_id.'">
					<img class="edit" src="edit1.png"></img>
					<div class="title">'.$_POST['title'].'</div>
					<div class="detail">
					
						post by: '.$_SESSION['username'].'
						edit by:'.$com['time'].'
					</div>
					<div class="post_content">
						<div id="post_text_'.$max_id.'">'.
							$_POST['comment'].'<br>
						</div>
						<div class="edit_div"  id="edit_div_'.$max_id.'">
							<form method="post">
									<textarea id="edit_textarea_'.$max_id.'" rows="4" cols="50">'.$_POST['comment'].'</textarea>
									<br>
					   			<button class="pure-button button-send edit_submit_button" type="submit">done</button>
				   			<form>
						</div>
						<form method="post">
							<button class="delete button-error pure-button delete_btn_pos">delete</button>
						</form>
						<button class="reply button-secondary pure-button reply_btn_pos">reply</button>
					</div>
				</div>';
				echo'
				<div class="reply_board" id="reply_board_'.$max_id.'">
					<div id="append_use_'.$max_id.'"></div>
					<form method="post" class="reply_form">
						<input id="reply_'.$max_id.'" type="text" style="width:85%"/>
						<button class="reply_submit" id="reply_submit_'.$max_id.'">send</button>
				   	</form>
				</div>';
			
			}
		    
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
