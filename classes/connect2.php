<?php 
	//class to check connection
	class connect{
	public $connection_info=array();
	private $resource;
		public function connect($db_server,$db_username,$db_password,$database){
		
			$this->connection_info['db_server']=$db_server;
			$this->connection_info['db_username']=$db_username;
			$this->connection_info['db_password']=$db_password;
			$this->connection_info['database']=$database;
			connect::create_connection();
	}
	//function to test connection
	
		static function create_connection(){
			$this->resource=mysql_connect($this->connection_info['db_server'],
							$this->connection_info['db_username'],
							$this->connection_info['db_password']
							);
			if(!$this->resource){
				echo "Could not connect to connect to database".mysql_error();
			}
			//selects the database
			$db_select=mysql_select_db($this->connection_info['database'],$this->resource);
			if(!$db_select){
				echo "Could not select database".mysql_error();
			}
		}
			
		
	}//class meant for the various accounts
	class accounts{
		public  function accounts(){
			if(isset($_POST['login'])){
				$this->login();
				unset($_POST['login']);
			}
			else if(isset($_POST['signup'])){
				$this->create_account();
				unset($_POST['signup']);
			}
			else if(isset($_POST['signout'])){
				$this->signout();
				unset($_POST['signout']);
			}
			else
				$this->kickout();
		
		
		function login(){
			$username= mysql_real_escape_string($_POST['username']);
			$password= md5(mysql_real_escape_string($_POST['password']));
			//checks whether user is registered in the database
			$result=mysql_query("select * from users where username='$username' AND password='$password'");
			$new = $result;
			if(mysql_num_rows($new) > 0){
				session_start();
				while($userinfo = mysql_fetch_array($new)){
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['user'] = $userinfo['username'];
				header('Location:?ref=BLOG');
				}
			}		else{
						echo "Wrong username/password";
						$redirect=new links("index.php","TRY AGAIN");
					}
				
		
		}//end of function login()
		
		private function create_account(){
			$name=mysql_real_escape_string($_POST['name']);
			$email=mysql_real_escape_string($_POST['email']);
			$passwd=md5(mysql_real_escape_string($_POST['password']));
			$usernm=mysql_real_escape_string($_POST['username']);
			$agree=$_POST['agreement'];
			$stamp = date(Y:M:D H:M:S);
			//check whether this user infos is already found in the database
				$query="SELECT username FROM users WHERE username=$usernm AND password=$passwd";
				$result=mysql_query($query);
				if(!$result){
						echo"Could not select the username <br>".mysql_error();
					}
					
				if(mysql_num_rows($result)>0){
					echo "Invalid user details <br>";
					$res=new links("index.php","Change Them");
					}
				else{
				$result=mysql_query("INSERT INTO users VALUES('$name','$usernm','$passwd','$email','$agree','$stamp')" );
					if(!$result){
						echo "Problems creating account<br>".mysql_error();
						links::__construct("index.php","try again");
							}
						else{
							session_start();
							$_session['id']=$stamp;
							$_session['user']=$user;
						}						
					}
		}//end of function create_account
	
		private function signout(){
			unset($_SESSION['id']);
			unset($_SESSION['user']);
			$_SESSION_DESTROY();
		}//end of sign out function
		function kickout(){
			header('Location:index.php');
		}//end of function kickout()
	}//end of class accounts
	
	
	//class to hold comments and posts
	
	class uploads{
		function uploads(){
			if(isset($_POST['post'])){
				$this->sendPosts();
				unset($_POST['post']);
			}
			else (isset($_POST['post'])){
				$this->sendComments();
				unset($_POST['signup']);
			}
		}//end of fxn uploads
		
		function sendPost(){
			connect::__construct("localhost","root","","living_site");
			$title=mysql_real_escape_string($_POST['title']);
			$post=mysql_real_escape_string($_POST['item']);
			$stamp = date(Y:M:D H:M:S);
			$query="INSERT INTO posts(id,userid,title,post) VALUES ('$stamp','$_SESSION['id']','$title','$post')";
			if(mysql_query($query)){
				echo "Post made successful";
				}
			else{
					echo "Posting failed <br>".mysql_error();
				}	
			}//end of the sendPost
			
		function sendComment(){
			connect::__construct("localhost","root","","living_site");
				$comment=mysql_real_escape_string($_POST['comment']);
				$stamp = date(Y:M:D H:M:S);
				
				}//still to be completed
	}//end of class uploads			
	
	class display{
			function post(){
				connect::__construct("localhost","root","","living_site");
				$result=mysql_query("SELECT * FROM posts");
				if(!$result){
					echo" Could not query database <br>".mysql_error();
				}
				echo"<table>";
				while($post=mysql_fetch_array($result)){
					echo"<tr><td>"."<br>";
					echo $post['title'];
					echo $post['item'];
					echo "</td><td>";
					$this->Comment($_POST['id']);
					echo"</td></tr>"."<br>";
				}
				echo"</table>";
			}//end of function post
			
			function Comment($postid){
					$query="SELECT comment.*,username FROM comments,users WHERE pid="$postid" AND userId=comments.uid";
					$result=mysql_query($query);
					while($comment=mysql_fetch_array($result)){
						echo "<div class="comment">";
						echo $comment['username'].$comment['id']."<br>";
						echo $comment['comment'];
						echo "<textarea cols='10' rows='10' placeholder='make your comment'></textarea>";
						}
				}//end of comment function
	}
}//end of class display		

class links{
		function __construct($ref,$vlink){
			$this->createDisplayLink($ref,$vlink);
		}
		function createDisplayLink($ref,$vlink){
			echo "<a href=\" ".$ref ."\">".$vlink."</a>";
		}
}//end of class links
		class headerFooter(){
			foreach($links as $index => $value){
				echo "<span class='$class'>";
				$$value=new links($index,$value);
				echo "</span>";
				}
		}//end of class headerFooter
}
			
			/*while($post=mysql_fetch_array($result,MYSQL_ASSOC)){
				echo "<img src=\".post['path']\">";
				$postId=$post['postId'];
				post_comment::display_comments($postId);
			}
			post_comment::make_post($postId);
		}
		
		function display_comment($postId){
			$result=mysql_query("SELECT * FROM comments where postId='$postId'");
			while($comment=mysql_fetch_array($result)){
			echo "User".$comment['uid']."made comment<br><br>".$comment['comment']."<br>";
			}
		}*/
	?>