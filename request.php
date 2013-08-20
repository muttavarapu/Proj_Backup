<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");
		if(isset($_POST['submit'])){$name = $_POST['name'];$skill=$_POST['skill'];$level=$_POST['level'];
		if(isset($name)){$message=$name.$level.$skill;}
		if(isset($message)){}else{$message="";}	}
						?>
<HTML>

	<?php include('includes/head.php')?>


		
		
		
		
		
		
<div id="wrap"><!--to wrap whole content along with adds to float left --> 

<div class="add"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a>add 1--></div> 

<div class='login'>
 <div id="content">
<h1 class='dhead'>Submit tutorial  |  Help us build more complete tutorial library!</h1>
<?php if(!empty($message)){echo "<p>".$message."</p>";}

	if(!$connection){
	die("Cannot load your request:" .mysql_error());

	}
else{


echo '</hr><form action="request.php" method="post">Name of tutorial &nbsp : <input type="text" name="name">
						
						<br>Subject &nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp  &nbsp:&nbsp&nbsp<select name="soft">
						  <option value=""></option>
						  '.radio("soft").'
						</select><br>Software/ Skill &nbsp&nbsp &nbsp : 
						<select name="cat">
						  <option value=""></option>
						  '.radio("cat").'
						</select><br>Difficulty/level   &nbsp  &nbsp:&nbsp&nbsp&nbsp
						<select name="level">'.
						 radio('level').'
						</select><br/><input type="submit" value="Submit!"/></form>';
}?>
</div>


</div>







<div class="right"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>   <br><br><br>    <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>    </div>

</div>

<?php include('includes/foter.php')?>
</BODY>
</HTML><?php mysql_close($connection);?>		