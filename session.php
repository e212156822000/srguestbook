<?php
session_start();
$_SESSION['login'] = 101;
$_SESSION['username'] = $_POST['username'];
$_SESSION['login_time'] = time();
if(empty($_SESSION['token']))
{
	$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
}
?>