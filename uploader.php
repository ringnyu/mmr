<?php
			if ($_FILES["uploadedfile"]["error"] > 0)
	  {
	  echo "Error: " . $_FILES["uploadedfile"]["error"] . "<br>";
	  }
			else
	  {
	  echo "Upload: " . $_FILES["uploadedfile"]["name"] . "<br>";
	  echo "Type: " . $_FILES["uploadedfile"]["type"] . "<br>";
	  echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " kB<br>";
	  echo "Stored in: " . $_FILES["uploadedfile"]["tmp_name"];
	  }
	  
		  if (file_exists("upload/" . $_FILES["uploadedfile"]["name"]))
		  {
		  echo $_FILES["uploadedfile"]["name"] . " already exists. ";
		  }
		else
		  {//fail to stream file error i donot understand
		  move_uploaded_file($_FILES["uploadedfile"]["tmp_name"],"upload/" . $_FILES["uploadedfile"]["name"]);
		  echo "Stored in: " . "upload/" . $_FILES["uploadedfile"]["name"];
		  }

?>