<?php 
$ip = $_SERVER["REMOTE_ADDR"];
session_start();

//check if session is set
if(isset($_SESSION['username'])){
				$session_username=$_SESSION['username'];
				$session_pass=$_SESSION['pass'];
				$session_id=$_SESSION['id'];
				//check member data
				$query=mysql_query("SELECT * FROM membership.members WHERE id='$session_id' AND password='$session_pass' LIMIT 1") or die("Could not check the session");
				$q = mysql_query("SELECT id FROM membership.subscribers WHERE username='$session_username'") or die("failed to read userdata from db".mysql_error());;
                $w_count=mysql_num_rows($q);
				while($wrow=mysql_fetch_array($q)){$w_list[]=$wrow[0];}
				$count_count=mysql_num_rows($query);
				if($count_count > 0){
						while($row=mysql_fetch_array($query)){$session_username=$row['username'];}
						$_SESSION['id']=$session_id;
						$_SESSION['username']=$session_username;
						$_SESSION['pass']=$session_pass;
						$loggedin=1;}
				else{
				header("Location:login.php");
				exit(); 
				}
}
elseif(isset($_COOKIE['id_cookie'])){
$session_id=$_COOKIE['id_cookie'];
$session_username=$_COOKIE['username_cookie'];
$session_pass=$_COOKIE['pass_cookie'];
$query=mysql_query("SELECT * FROM membership.members WHERE id='$session_id' AND password='$session_pass' LIMIT 1") or die("Could not check the session");
$count_count=mysql_num_rows($query);
if($count_count > 0){$loggedin=1;}
else{
header("Location:login.php");
exit(); 
}
}
else{$loggedin=0;}


?>