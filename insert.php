<?php
	include("register.html");
	
	if(!isset($_POST['submitted'])){
		header("Location:register.html");
	}

?>