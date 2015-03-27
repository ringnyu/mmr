<?php
	include("header.php");
	include("index.php");
	include("classes/connect.php");
	//create an instance of the connection to database
	$connection=new connect("localhost","root","","living_site");
	$connection->connect("localhost","root","","living_site");
	$connection->database_connection();
	$connection->database_selection();
	//
	$acc=new accounts();
	$acc->login_user();
	include("footer.php");
?>