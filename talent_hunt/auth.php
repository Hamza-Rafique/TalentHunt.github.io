<?php
session_start();

if(isset($_POST['submit'])){

	if(!empty($_POST['email']) AND !empty($_POST['password'])){
		require_once 'db.php';

		$authenticated = authenticate($_POST);
		if($authenticated){

			$_SESSION['logged_in'] = [
				'id'	=> $authenticated['id'],
			];

			header('location: index.php');
		}
		else{
			header('location: login.php?error=Incorrect email or password');
		}
	}
	else{
		header('location: index.php?error=All fields required');	
	}
}
else{
	header('location: index.php?error=Please login to your account');
}