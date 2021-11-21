<?php

// Logout session destroy and login view redirect

	session_start();

	$_SESSION = array();
	session_destroy();

	setcookie('authentification', '');
	setcookie('pass_hash', '');
	
	header('Location:authentification');
?>