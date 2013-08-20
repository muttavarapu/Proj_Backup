<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<?php 
if($loggedin ==1){redirect_to('Courses.php');}
else{
if(isset($_POST['username'])){ $username=$_POST['username'];
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];$email=$_POST['email'];

if((!$username)||(!$fname)||(!$lname)||(!$pass1)||(!$pass2)||(!$email)){$message="Please insert all required fields in the registration form";}
else if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email)){ //validate email address - check if is a valid email address
			$email="";
			$message = "You have entered an invalid email address!";
	}
else{

if($pass1!=$pass2){$message="Passwords do not  Match";}
elseif(strlen($pass1) <=5 ){$message="Passwords should be more than 5chars long";}
else{$username=strtolower($username);
$username=preg_replace("#[^0-9a-z]#i","",$username);
$lname=preg_replace("#[^0-9a-z]#i","",$lname);
$fname=preg_replace("#[^0-9a-z]#i","",$fname);
$pass1=sha1($pass1);
$email=mysql_real_escape_string($email);
$user_query=mysql_query("SELECT username FROM membership.members WHERE username='$username' LIMIT 1")or die("Could not check for usernames error with connection");
$count_username=mysql_num_rows($user_query);
$email=strtolower($email);
$email_query=mysql_query("SELECT email FROM membership.members WHERE email='$email' LIMIT 1")or die("Could not check for usernames error with connection");
$count_email=mysql_num_rows($email_query);
if($count_username > 0){$message="Username already taken";}
else if($count_email > 0){$message="The mail you provided is already registerd with us<br> <a href='lostPassword.php'>Lost Password?</a> ";}
else{
$query=mysql_query("INSERT INTO membership.members(username,firstname,lastname,email,password,ip_address,sign_up_date,last_logged_in) VALUES('$username','$fname','$lname','$email','$pass1','$ip',now(),now())")or die("failed to enter data into db".mysql_error());
$member_id=mysql_insert_id();
mkdir("users/$member_id",0755);
$message="Yay! You have been registered. Now you can login to your account!";
$goto ='login.php?msg='.$message;
redirect_to($goto);
}

}

}
}}

?>
<?php include('includes/head.php')?>

<script>

function usercheck(str)
{
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("write").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","includes/usercheck.php?q="+str,true);
xmlhttp.send();
}
function mailcheck(str)
{
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("mail").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","includes/mailcheck.php?q="+str,true);
xmlhttp.send();
}</script>







<div id="wrap">
<div class="add">
<!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a>
--></div>

<div class='login'>
 <div id="content">
<h1 class='dhead'>Register to Tutoscoop  |  The free tutorial place Just a Click away!</h1>
<?php if(!empty($message)){echo "<p>".$message."</p>";}?>
<form action="register.php" method="post">
<input type="text" name="username" onkeyup="usercheck(this.value)" size=15 maxlength=15 <?php if(!empty($username)){echo 'value="'.$username.'"';}?>placeholder="Username"/><span id="write">
</span>
</br>

<input type="text" name="fname" size=25 maxlength=25 <?php if(!empty($fname)){echo 'value="'.$fname.'"';}?>placeholder="Firstname"/></br>

<input type="text" name="lname" size=25 maxlength=25 <?php if(!empty($lname)){echo 'value="'.$lname.'"';}?>placeholder="Lastname"/></br>

<input type="text" name="email" onkeyup="mailcheck(this.value)" size=25 <?php if(!empty($email)){echo 'value="'.$email.'"';}?>placeholder="Email Address"/><span id="mail">
</span></br>

<input type="password" name="pass1" size=25 placeholder="Password"/></br>
<input type="password" name="pass2" size=25 placeholder="Validate Password"/></br>
<input type="submit" value="Register!"/>

</form>

</div>


</div>
<div class="right"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>  <br><br><br>     <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a>--></div>    </div>

</div>
<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>