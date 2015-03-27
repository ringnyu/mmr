<?php
	/*include("header.php");
	//include("index.php");
	include("classes/connect.php");
	//create an instance of the connection to database
	$connection=new connect("localhost","root","","living_site");
	$connection->connect("localhost","root","","living_site");
	$connection->database_connection();
	$connection->database_selection();
	//
	$acc=new accounts();
	$acc->login_user();
	//include("sessions.php");
		echo '<div id="post" style="float:left">
		<form action="uploader.php" method="POST" enctype="multipart/form-data" >
		<br><br>
		CHOOSE A FILE TO UPLOAD<br><br>
		<input type="file" name="uploadedfile"/> <br>
		STORY<br><br>
		<textarea id="story" cols="30" rows="10" ></textarea>
		<input type="submit" value="submit" name="Upload_file"/>
		
		</form>
		</div>
		
		<div id="comments">
			<input type="text" name="your_comment" />
		</div>
		
		<div id="showcomments" style="float:left;border:1px solid black">
		</div>';
		?>
		<?php // include("livingSite2.html");
		//include("livingSite2.css");
		//include("footer.php");?>
	<?php */
	
	require_once 'connect.php';
	$validatepost= new upload();
		if(isset($_SESSION['id'])){
			?>
		<form>
			<input type="submit" name="signout" value="signOut"><br>
		</form>
		
		<?php
			echo "$nbps,$nbps". $_SESSION['user'];
			}
		$displayPC=new display();
		$displayPC=post();
		}
		echo '<form>
				<br><br>
				<input type="text" name="title"/><br>
				CHOOSE A FILE TO UPLOAD<br><br>
				<input type="file" name="item"/> <br>
				STORY<br><br>
				<textarea id="story" cols="30" rows="10" ></textarea>
				<input type="submit" value="Post" name="post"/>
				
		</form>';
		?>