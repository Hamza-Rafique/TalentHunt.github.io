<?php
session_start();

if(isset($_SESSION['logged_in'])){
	$_SESSION = [];
	setcookie(session_name(), md5(mt_rand(1,100)), time()-1000, "/");
	session_destroy();

	header('location: index.php');
}
else{
	header('location: index.php?error=Please login to your account');
}