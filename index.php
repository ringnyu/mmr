<?php
		/*include("header.php");
		echo'<h1>LOGIN TO YOUR ACCOUNT</h1><br><br>';
	echo ('<form action="post.php" method="post" enctype="multipart/form-data"> 
	Username:<input type="text" name="username" id="username" placeholder="username"/><br>
	<br>
	Password:<input type="password" name="pwd" id="pwd" placeholder="password"/><br>
	<input type="submit" value="Submit"><br>
	</form> 
	</div>
	');
	?>
	<br><br>
	<br><br>
	
	<div style="">
	<h1>DO NOT HAVE AN ACCOUNT?</h1><br>
	<a href="register.html">CREATE ACCOUNT</a>
	</div>
	
	
</body>
	<?php include("footer.php");*/
	 
	 //the index file begins here
	 include_once ('classes/connect.php');
	 $newaccount = new accounts();
		if(isset($_SESSION['id'])){
	?>
	<form>
		<input type="submit" name="signout" value="signOut"><br>
	</form>
	
	<?php
		echo "$nbps,$nbps". $_SESSION['user'];
		}
		headerFooter::__construct($links,$vlink);
		echo "Welcome" . $_SESSION['user']."to my site";
		
		if(isset($_SESSION['user'])){
				echo'<h1>LOGIN TO YOUR ACCOUNT</h1><br><br>';
	echo ('<form method="post" enctype="multipart/form-data"> 
	Username:<input type="text" name="username" id="username" placeholder="username"/><br>
	<br>
	Password:<input type="password" name="password" id="pwd" placeholder="password"/><br>
	<input type="submit" name="login" value="login"><br>
	</form> ');
			include 'register.html';
		}
		
	?>
