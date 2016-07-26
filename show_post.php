<?php

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

		$comsql = "SELECT id,user_id, title, comment, time  FROM comments ORDER BY id DESC";
		foreach($conn->query($comsql) as $com){
			$current_usersql = "SELECT id  FROM users WHERE username = '".$_SESSION['username']."'";
			foreach($conn->query($current_usersql) as $cur){
				$other_usersql = "SELECT username  FROM users WHERE id = '".$com['user_id']."'";
				foreach($conn->query($other_usersql) as $usr){
					echo '
					<div class="board" id="'.$com['id'].'">';

					if($com['user_id'] == $cur['id'])
					{
						echo '
						<img class="edit" src="edit1.png"></img>';
					}
					else
					{
						echo '
						<img class="report" src="cancel.png"></img>';
					}
						
					echo'<div class="title">'.$com['title'].'</div>
						 <div class="detail">
							post by: '.$usr['username'].'
							edit by:'.$com['time'].'
					     </div>
						 <div class="post_content">
							<div id="post_text_'.$com['id'].'">'.
							$com['comment'].'<br>
							</div>';
					if( $com['user_id'] == $cur['id']) 
					{
						echo '
							<div class="edit_div"  id="edit_div_'.$com['id'].'">
								<form method="post">
		   							<textarea id="edit_textarea_'.$com['id'].'" rows="4" cols="50">'.$com['comment'].'</textarea>
		   							<br>
						   			<button class="pure-button button-send edit_submit_button" type="submit">done</button>
					   			<form>
					   		</div>
							<form class="delete_form" method="post">
								<button class="delete button-error pure-button delete_btn_pos">delete</button>
								<input type="hidden" value="'.$_SESSION['token'].'" id="delseed"/>
							</form>';
						
					}
						echo'
							<button class="reply button-secondary pure-button reply_btn_pos" >reply</button>
						</div>
					</div>

					<div class="reply_board" id="reply_board_'.$com['id'].'">';
					 //shpw replies 
					 $replysql = "SELECT id, reply ,time  FROM replies WHERE comment_id = '".$com['id']."'";
					 foreach($conn->query($replysql) as $rep){
					 	echo'
						 <div id="reply_single_'.$rep['id'].'" class="reply_single">
			     			<div class="reply_author">'.$_SESSION['username'].'</div>
			     			<div class="reply_text">'.$rep['reply'].'</div>
			     			<div class="reply_time">'.$rep['time'].'</div>
				  	  	 </div>';
					 }
					 //show input box
					echo'
						<div id="append_use_'.$com['id'].'"></div>
						<form method="post" class="reply_form">
							<input id="reply_'.$com['id'].'" type="text" style="width:85%"/>
							<button class="reply_submit pure-button button-send" id="reply_submit_'.$com['id'].'">send</button>
						 </form>
					</div>';
				}
			}
		}

	}//end try
	catch(PDOException $e)
	{
    	echo "Show failed: " . $e->getMessage();
	}

?>
