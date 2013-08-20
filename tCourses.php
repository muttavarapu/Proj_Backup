<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/tfunctions.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<?php 
if(isset($_GET["soft"])){$soft=$_GET["soft"];}
if(isset($_GET["cat"])){$cat=$_GET["cat"];}
if(isset($_GET["sort"])){$sort=$_GET["sort"];} else{$sort = "id";}
if(isset($_GET["val"])){$val=$_GET["val"];} else{$val = "DESC";}

?>
<?php include('includes/head.php')?>

<script type="text/javascript" src="jquery.min.js"></script>
 <script type="text/javascript" src="includes/vote.js"></script>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
	google.load('jquery', '1.4.1');
</script>







<div id="wrap">
<div class="add">
<!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a>
--></div>
<div id="content">

  <?php 
	if(!$connection){
	die("Cannot load your request:" .mysql_error());

	}
					

	else{
	
	
					//build the quirey function from url values
					$quirey="SELECT id, course_name, soft, cat, LEFT(Description, 145) AS descc, imglink,  yt, duration, views, videos, level, date  FROM tutoscoop.courses";
					if(isset($_GET["soft"],$_GET["cat"])){
								$quirey.=" WHERE soft='{$soft}' AND cat='{$cat}'";
								$count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses WHERE soft = '{$soft}' AND cat = '{$cat}' ");
								$url= "<a href=?soft={$soft}&cat={$cat}" ;
					}
					elseif(isset($_GET["cat"])){
								$quirey.=" WHERE cat='{$cat}'";
								$count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses WHERE cat = '{$cat}' ");
								$url= "<a href=?cat={$cat}" ;
					}
					elseif(isset($_GET["soft"])){
								$quirey.=" WHERE soft='{$soft}' ";
								$count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses WHERE soft = '{$soft}' ");
								$url= "<a href=?soft={$soft}" ;
					}
					else{
								//$cat="";
								//$soft="";
								$count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses ");	
								$url= "<a href=?" ;				
					}
					
			
			
			/*for sub nav and location*/	
			$out1="<div id='left'><b>You are here: </b><a href='Courses.php'>tutorials</a>";
					if(isset($soft,$cat)){$out1 .= "<a href=\"Courses.php?soft={$soft}\">/{$soft}</a>/<a href=\"Courses.php?cat={$cat}\">{$cat}/</a></div>"; }
					elseif(isset($soft)){$out1 .= "<a href=\"Courses.php?soft={$soft}\">/{$soft}/</a></div>";}
					elseif(isset($cat)){$out1 = "<a href=\"Courses.php?cat={$cat}\">/{$cat}</a>/</div>";}
					else{$echo= "idiot select something";$out1.="</div>";}
                    //sort menu

					sort_menu($out1,$url);


							$url.="&sort={$sort}&val={$val}&page=";
			// pagination requires 2 variables primarly  ...$number of pages...$howmany results2display per page.....$ where 2 start.....
						 $perpage=5;
						 //determines the number of pages
						 //$count_pages= mysql_query("SELECT COUNT('id ') FROM courses WHERE soft LIKE '{$search}' OR cat LIKE '{$search}' OR 'Description' LIKE '{$search}' ");
						 $pages =ceil(mysql_result($count_pages,0)/$perpage);
			            		 
						 //checks where we are
						 $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
						 //to give the sql command wg=here to start ......it counts how many displayed previously and from where it should continue further
						 $start = ($page - 1) * $perpage;
						 
						 //pagination ends


					$quirey.=" ORDER BY {$sort} {$val} LIMIT {$start},{$perpage} ";



					if($page > $pages)		
							{echo '</br>there are no more results to display.....</br>to return to 1st page  '.$url.'&page=1>click here</a>';}
					
					else{
							$result=mysql_query($quirey,$connection);


							if(!$result){
							die("Cannot load your request" .mysql_error());

							}
							else{
							showresult($result);
							
							
							//page number navigation
							
						    pagination($page,$pages,$url);
							}
						}

	//page number navigation ends
					
						
					
					
	
					
	}
					?>

</div>
</div>
<div class="right"><!--<a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>  <br><br><br>     <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"></div><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>-->    

</div>
<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>