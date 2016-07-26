<?php
function check_session(){
	$duration_time = 7200;
	$current_time = time();
	if( isset($_SESSION['login']) && isset($_SESSION['username']) && (time()-$_SESSION['login_time'] > $duration_time) )
	{
		return true;
	}else
	{
		return false;
	}

}

?>