<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");?>

<?php 
if(isset($_GET["id"])){$id=$_GET["id"];}
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>

<?php include('includes/head.php')?>
<script type="text/javascript" src="jquery.min.js"></script>
    <link type="text/css"
        href="jqueryui.css" rel="stylesheet" />
    <script type="text/javascript" src="jqueryui.js"></script>
    <script type="text/javascript" src="vote.js"></script>
    <script type="text/javascript" src="jquery.youtubepopup.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("a.youtube").YouTubePopup({ autoplay: 0 });
        });
    </script>

	
<div id="wrap">
<div class="add"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a></div>
<div id="content">

 <?php 
 
 //connection
if(!$connection){
die("Cannot load your request:" .mysql_error());

}
		else{
						if($id){
						
						
						$quirey = "SELECT *FROM tutoscoop.tutos WHERE id ={$id}";
						

						$result=mysql_query($quirey,$connection);
						
						if(!$result){
						die("Cannot load your request" .mysql_error());

						} 
						while($row=mysql_fetch_array($result)){
						echo '<div class ="tutorial"><b>'.$row[2].'</b><br><a class="youtube" href="http://www.youtube.com/watch?v='.$row[4].'" 
            title="jQuery YouTube Popup Player Plugin TEST"> '.'<img class="thumb" src="http://img.youtube.com/vi/'.$row[4].'/mqdefault.jpg" alt="image"></img><img src="img/play.png" class="button"/></a><div class="clear"></div><b>Description:</b>'.$row[3].'</div>';
						
						}

		}






}





?>

</div>
<div class="right"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>   <br><br><br>    <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div>


<div class="relt"><h2>Related</h2><hr>
<?php for($i=0;$i<3;$i+=1){ 
$quirey="SELECT id, course_name, soft, cat, LEFT(description, 145) AS descc, imglink, source FROM tutoscoop.courses WHERE id= {$id}";
$result=mysql_query($quirey,$connection);$row=mysql_fetch_array($result);
$readmore=$row['descc'];
$lastspace=strrpos($readmore," ");
$read=substr($readmore,0,$lastspace);
echo "<a href=\"viewcourse.php?id={$row[0]}\"><div id=\"rel\"><p><h1>".$row[1]."</h1><b>Software:</b>".$row[2]."<div class=\"left\"><b>Categeory: </b>".$row[3]."</div></br>"."<div class='videoplayer'>".$row[6]."</div><b>Description:</b>".$read.".... <a href=\"viewcourse.php?id={$row['id']} \" ><b color='red'><i>Read More</i></b></a> </p></div></a>";
$id+=1;}?></div>




<div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>    </div>

</div>
<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>
