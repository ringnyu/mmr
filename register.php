<?php
	include("register.html");
	include("classes/connect.php");
	
	$connection=new connect("localhost","root","","living_site");
	$connection->connect("localhost","root","","living_site");
	$connection->database_connection();
	$connection->database_selection();
	//create an instance of the account class
	$account=new accounts();
	$account->create_account();

?>