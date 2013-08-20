<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");
// this change is made to test git?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<?php 
if($loggedin ==1){redirect_to('Courses.php');}
$message="";
if(isset($_GET['msg'])){$message=$_GET['msg'];}if(isset($_POST['email'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$remember=$_POST['remember'];
if((!$email) ||(!$pass)){$message='please insert both password and email!';}
else{$email=mysql_real_escape_string($email);
$pass=sha1($pass);
$query=mysql_query("SELECT * FROM membership.members WHERE email='$email' AND password='$pass' LIMIT 1") or die("could not find the member");
$count_query=mysql_num_rows($query);
if($count_query==0){$message="The Username/Password you entered was incorrect<br><a href='lostPassword.php'>Lost Password?</a>";}
else{
$_SESSION['pass']=$pass;
while($row=mysql_fetch_array($query)){$username=$row['username'];
$id=$row['id'];}
$_SESSION['username']=$username;
$_SESSION['id']=$id;
if($remember=="yes"){setcookie("id_cookie",$id,time()+60*60*24*100,"/");
setcookie("username_cookie",$username,time()+60*60*24*100,"/");
setcookie("pass_cookie",$pass,time()+60*60*24*100,"/");}

$query=mysql_query("UPDATE membership.members SET `last_logged_in`=NOW() WHERE username='$username'")or die("failed to enter data".mysql_error());

redirect_to("Courses.php");

}
}


}

?>
<?php include('includes/head.php')?>











<div id="wrap">
<div class="add">
<!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a>
--></div>

<div class='login'>
 <div id="content">
<h1 class='dhead'>Login to your account  |  The free tutorial place Just a Click away!</h1>
<?php if(!empty($message)){echo "<p>".$message."</p>";}?>
</hr><form action="login.php" method="post">
<input type="text" name="email" placeholder="Email Address"/></br>
<input type="password" name="pass" placeholder="Password"/></br>
<input type="checkbox" name="remember" value="yes" checked="checked" placeholder="remember"/>Stay Signedin</br>
<input type="submit" value="Login!"/>

</form>

</div>


</div>
<div class="right"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>  <br><br><br>     <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a>--></div>    </div>

</div>
<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>