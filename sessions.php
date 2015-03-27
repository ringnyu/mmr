<?php
	
	session_start();
	include("register.html");

	if(isset($_SESSION['username']))
	$_SESSION['username']=$_SESSION['username']+1;
	else
	$_SESSION['username']=1;
	echo "USERNAME=". $_SESSION['username'];

	?>