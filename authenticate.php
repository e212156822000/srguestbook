<?php
if($_POST['username'] != NULL && $_POST['password'] != NULL)
{
	include("session.php");
	$_POST['username'];
	$servername = "140.115.189.133";
	$username = "root";
	$password = "0000";
	$dbname = "test";

	try 
	{
	    $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password);
	    //echo wrong messenge 
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //select data
	    $sql = "SELECT username, password FROM users WHERE username = '".$_POST['username']."'" ;
	    //check if username is wrong
		if ($conn->query($sql)-> rowCount() <= 0) echo "wrong username! ";
		//check password
	    foreach ($conn->query($sql) as $row) {
	    	if($row['password'] == $_POST['password'] ){
	    		echo "correct password! ";
	    		echo '<meta http-equiv="refresh" content="0; URL=main.php">';
	    	} 
	    	else echo "wrong password! ";
	    }
	}
	catch(PDOException $e)
	{
    	echo "Connection failed: " . $e->getMessage();
	}

}
else
{
echo "Please input some text.";
}
?>
