<?php 
	session_start();
	$_SESSION['registrado']=null;
	$_SESSION['rol']=null;
	// remove all session variables
	session_unset(); 
	// destroy the session 
	session_destroy();
 ?>