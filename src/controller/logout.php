<?php
	require_once  dirname(__FILE__).'/./processa_login.php';
	session_destroy();
	header("Location: " . "login.php");

?>