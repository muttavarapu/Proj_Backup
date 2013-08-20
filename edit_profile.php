<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");
if(isset($message)){}
else{$message="";}
if(isset($_GET['msg'])){$message=$_GET['msg'];}
if($loggedin==0){redirect_to("login.php?msg='You need to login to continue'");}
else{
if(isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['about'])){
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$about=$_POST['about'];
$lname=preg_replace("#[^0-9a-z]#i","",$lname);
$fname=preg_replace("#[^0-9a-z]#i","",$fname);$about=mysql_real_escape_string($about);
//$about=nl2br($about);
$query=mysql_query("UPDATE membership.members SET `firstname`='$fname',`lastname`='$lname',`about`='$about' WHERE username='$session_username'")or die("failed to enter data".mysql_error());

$message="Yay! You have Updated your profile Sucessfully.<br>";
$goto ='profile.php?msg='.$message;
redirect_to($goto);
}
if($session_username){

$query=mysql_query("SELECT * FROM membership.members WHERE username='$session_username' LIMIT 1") or die("Could not check the session");}
else{redirect_to('login.php?msg="error please login again!"');}
}





?>
<HTML>

	<?php include('includes/head.php')?>


		
		
		
		
		
		
<div id="wrap"><!--to wrap whole content along with adds to float left --> 

<div class="add"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a>add 1--></div> 

<div class='login'>
 <div id="content">
<h1 class='dhead'>
<?php $row=mysql_fetch_array($query);
echo ucfirst($row[2])." | Update your info</h1><hr>";?></h1>

<?php if(!empty($message)){echo "<p>".$message."</p>";}

$about=$row['about'];
echo '<form action="edit_profile.php" method="post">About me  :<br>   <textarea cols=85 rows=3 name="about" >'.$about.'</textarea></br>Firstname  :   <input type="text" size=25 maxlength=25 value="'.$row['firstname'].'" name="fname"/></br>Lastname  :   
<input type="text" size=25 maxlength=25 name="lname" value="'.$row['lastname'].'"/></br>
<input type="submit" value="Submit!"/>

</form>';
echo "</br>Email Address  :   ".$row['email']; ?></p>






</div>


</div>






<div class="right"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>   <br><br><br>    <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a>--></div>    </div>

</div>

<?php include('includes/foter.php')?>
</BODY>
</HTML>
<?php mysql_close($connection);?>		