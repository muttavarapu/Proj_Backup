<?php require("includes/connection.php");require_once("includes/global.php");require_once("includes/functions.php");?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>

<?php include('includes/head.php')?>

<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 











<div id="wrap">
<div class="add"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a></div>
<div id="content">

 <?php 
 
 // pagination requires 2 variables primarly  ...$number of pages...$howmany results2display per page.....$ where 2 start.....
 $perpage=6;
 //determines the number of pages
 $count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses");
 $pages =ceil(mysql_result($count_pages,0)/$perpage);
 
 //checks where we are
 $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
 //to give the sql command wg=here to start ......it counts how many displayed previously and from where it should continue further
 $start = ($page - 1) * $perpage;
 

 
if(!$connection){
die("Cannot load your request:" .mysql_error());

}
else{
echo "Recently Added<hr></br>"; 
$quirey="SELECT id, course_name, soft, cat, LEFT(Description, 145) AS descc, imglink,  yt, duration, views, videos, level, date  FROM tutoscoop.courses LIMIT {$start},{$perpage}";
$result=mysql_query($quirey,$connection);

if(!$result){
die("Cannot load your request" .mysql_error());

}echo"<div class='context'>";showresult($result);


echo"</div>";




echo '<div class="clear"></div>';echo '<div class="pagination">';
					echo "Your are viewing ".$page ." of ". $pages." pages <hr>";

if($pages >= 1 && $page <=$pages)
{							if (isset($_GET['page']))
							{$prev=$_GET['page'] - 1;
							echo '<a href=?page='.$prev.'>Previous </a>';
							}
							//page number diaplay  
							for($x=1;$x<=$pages;$x++){
							
							if($x == $page){echo '<b><a href=?page='.$x.'>'.$x.'&nbsp </a></b>';}
							else{
							echo '<a href=?page='.$x.'>'.$x.'&nbsp </a>';}}
							
							}if($pages > 1){
							
							if (isset($_GET['page']))
							{if($page >= $pages){}else{$next=$_GET['page'] + 1;
							echo '<a href=?page='.$next.'>Next </a>';}}
							else{echo '<a href=?page=2>Next </a>';}
							}
							
							
							
}echo '</div>';
?>

</div>








<div class="right"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a> <br><br><br>
<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>      


</div> </div>     <div class="clear">        <div class="add3">        <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>    </div>


<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>
