<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");
		if(isset($_POST['search'])){
						$search=mysql_real_escape_string(htmlentities(trim($_POST['search'])));   
						}
		elseif(isset($_GET['search']))   { $search=mysql_real_escape_string(htmlentities(trim($_GET['search']))); }
		else{$search="nothing.........Search something man";}
		if (isset($_GET['page'])){$page =$_GET['page'];}else{$page = 0;}
			if(isset($_GET["sort"])){$sort=$_GET["sort"];} else{$sort = "id";}
if(isset($_GET["val"])){$val=$_GET["val"];} else{$val = "DESC";}
						
						?>
<HTML>

	<?php include('includes/head.php')?>











<div id="wrap"><!--to wrap whole content along with adds to float left --> 

<div class="add"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a>
<br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6IjQ0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/160x600/banner1_in.jpg" /></a></div><!-- add 1-->




<div id="content">

 <?php 
 
 
if(!$connection){
die("Cannot load your request:" .mysql_error());
}
					
					
					
else{
		
					
	
					
					
					if (empty($search) OR $search =="Search") {echo"</br> you searched nothing search for something man ! " ;}
					elseif(strlen($search)<=2){echo "your search query is less than 3 characters long";}
					else{
					
					$url ='<a href=?search='.$search;
					$out1 = "<div id='mhead'><div id= 'left'>"."<b>Showing results for: </b>". $search."</div>"; 
					
					sort_menu($out1,$url);
					
					
					$url.="&sort={$sort}&val={$val}&page=";
					// pagination requires 2 variables primarly  ...$number of pages...$howmany results2display per page.....$ where 2 start.....
						 $perpage=1;
						 //determines the number of pages
						 $count_pages= mysql_query("SELECT COUNT('id ') FROM tutoscoop.courses WHERE course_name LIKE '%$search%' OR soft LIKE '%$search%' OR cat LIKE '%$search%' OR 'Description' LIKE '%$search%' ");
						 $pages =ceil(mysql_result($count_pages,0)/$perpage);
			            		 
						 //checks where we are
						 $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
						 //to give the sql command wg=here to start ......it counts how many displayed previously and from where it should continue further
						 $start = ($page - 1) * $perpage;
						 
						 //pagination ends
					
					
					if($page > $pages)		
							{echo '</br>there are no more results to display.....to return to 1st page of your search......<br> <a href=?search='.$search.'&page=1>click here</a>';}
							else{
							
					
					//result display
					$quirey="SELECT id, course_name, soft, cat, LEFT(Description, 145) AS descc, imglink,  yt, duration, views, videos, level, date FROM tutoscoop.courses WHERE course_name LIKE '%$search%' OR soft LIKE '%$search%' OR cat LIKE '%$search%' OR 'Description' LIKE '%$search%' ORDER BY {$sort} {$val} LIMIT {$start},{$perpage} ";
				
				$result=mysql_query($quirey,$connection);
				if(empty($result)){
					die("Cannot load your request" .mysql_error());

					}
					elseif(empty($pages)){ echo "your search returned zero results";}
					else{ showresult($result);
									
						  pagination($page,$pages,$url);	
					         	//page number navigation ends
	                    	}
							}

					
							
	}
 

		}
	?>
					
					
										
					

</div>
<div class="right"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>   <br><br><br>    <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a></div><div class="clear"><div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>    </div>

</div>

<?php include('includes/foter.php')?>
</BODY>
</HTML><?php mysql_close($connection);?>