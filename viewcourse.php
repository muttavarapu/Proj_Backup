<?php require("includes/connection.php");
require_once("includes/global.php");
include("includes/functions.php");?>

<?php if(isset($_GET["id"])){$id=$_GET["id"];}
if(isset($_POST['submit'])){
$cmt=mysql_real_escape_string($_POST['comment']);

$quy=mysql_query("INSERT INTO membership.comments(tutorial_id,comment,c_date,u_id) VALUES ('$id','$cmt',now(),'$session_username')")or die("failed to enter data into db".mysql_error());
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
        			$.fn.YouTubePopup.defaults = {
							'youtubeId': '',
							'title': '',
							'useYouTubeTitle': true,
							'idAttribute': 'rel',
							'cssClass': '',
							'draggable': false,
							'modal': true,
							'width': 800,
							'height': 480,
							'hideTitleBar': false,
							'clickOutsideClose': false,
							'overlayOpacity': .8,
							'autohide': 2,
							'autoplay': 1,
							'color': 'red',
							'color1': 'FFFFFF',
							'color2': 'FFFFFF',
							'controls': 1,
							'fullscreen': 1,
							'loop': 0,
							'hd': 1,
							'showinfo': 0,
							'theme': 'bar'
						};$("a.youtube").YouTubePopup({ autoplay: 0,hideTitleBar: true  });
			
        });
function delCmt(id)
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
    
    //document.getElementById(id).innerHTML=xmlhttp.responseText;
	//document.getElementById("s"+id).innerHTML=xmlhttp.responseText;
	document.getElementById("c"+id).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","includes/delcmt.php?cid="+id,true);
xmlhttp.send();
}
    </script>










<div id="wrap">

<div class="add"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjExNTEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/120x600/banner3_in.png" /></a></div>
<div id="content1">
<div id="content">

 <?php 
 
 //connection
if(!$connection){
die("Cannot load your request:" .mysql_error());

}
else{
	if(isset($id)){
			$quirey = "SELECT id, tutorial_id, name, LEFT(description, 145) AS descc, link, yt FROM tutoscoop.tutos WHERE tutorial_id ={$id}";
			$quirey2 = "SELECT * FROM tutoscoop.courses WHERE id ={$id} LIMIT 1";
			$result=mysql_query($quirey,$connection);
			$result2=mysql_query($quirey2,$connection);
						if(!$result){
						die("Cannot load your request" .mysql_error());

						}
			while($row=mysql_fetch_array($result2))
			{  $out1="";
					 $views = $row[9]+1;
			         $insert="UPDATE tutoscoop.courses SET views=".$views." WHERE id={$id}";$result3=mysql_query($insert,$connection);
			         $out1.= "<div id='mhead'>"."You are here :  <a href=\"Courses.php}\">Tutorials</a><a href=\"Courses.php?soft={$row[2]}\">/{$row[2]}</a>/<a href=\"Courses.php?cat={$row[3]}\">{$row[3]}/</a>{$row[1]}/ </div>";
					$out1.= "<div id=\"masterdec\"><p><h1>".$row[1]."</h1><div class=\"ele1\"><p><div class=\"left\"><b>Software: </b>".$row[2]."</div><b>Category: </b>".$row[3]."<br><b>Description: </b>".$row[4]."</p></div><div class=\"ele2\">views:<img src='img/eye.png'/>".$views."<br>Date:    ".$row[11]."<br>Duration    :".$row[8]."1 minutes<br>Level:".$row[11]."<br>videos:".$row[10];

                              if($loggedin==1){$check =in_array($row[0],$w_list);
								if($check ==0){ $out1.='<button class="view_c" id="s'.$row[0].'"  onclick="showHint(1,'.$row[0].')">Add</button><p><span id="'.$row[0].'">Add to watch list</span></p>';
                                             }
								else{  $out1.='<button id="s'.$row[0].'" onclick="showHint(0,'.$row[0].')">Del</button><p><span id="'.$row[0].'">In watchlist</span></p>';}
								           }
								else{$out1.="<a href='login.php'><button>Login to subscribe</button></a>";}
					$out1.='</div><div class="fb-like" id ="fb-like" data-href="http://developers.facebook.com/docs/reference/plugins/like" data-width="100" data-layout="button_count" data-show-faces="true" data-send="true"></div></div><div class=\"clear\"></div>';
				
				$out1.= "</div><div class='login'><div id='content'><br><h1 class='dhead'>This tutorial series consists of following videos</h1>";
						//main course info display ends
						
while(    $row=mysql_fetch_array($result)){
						$readmore=$row['descc'];
						$lastspace=strrpos($readmore," ");
						$read=substr($readmore,0,$lastspace);
						$out1.= '<div class ="tut_ele"><h2 class="Shead">'.$row[2].'</h2><br>';
						if($row[5]==1){$out1.='<a class="youtube" href="http://www.youtube.com/watch?v='.$row[4].'" 
            title="Watch now"> '.'<img class="thumb" src="http://img.youtube.com/vi/'.$row[4].'/mqdefault.jpg"/><img src="img/play.png" class="button"/></a>';}
			else{$out1.='<a href='.$row[4].'>Link Video</a>'.$row[4];}
			$out1.='<div class="clear"></div><b>Description:</b>'.$read.'.......<a href="tutorial.php?id='.$row['id'].'" >Read More</a></div>';
						
						}
						$out1.="</div></div><div class='login' id='notes'><div id='content'><br><h1 class='dhead'>Notes</h1>";
						if($loggedin==1){
						if($check==1){
							$q="SELECT notes FROM membership.subscribers WHERE id={$id} AND username='$session_username'";
							$result4=mysql_query($q,$connection);
							while($row=mysql_fetch_array($result4)){$out1.='<form action="viewcourse.php?id='.$id.'" method="post">  <textarea cols=85 rows=3 name="comment" placeholder="click to edit">';
							$out1.=$row[0].'</textarea></br><input type="submit" name="submit" value="Add notes" /></form>';}
						}
						else{$out1.='<form action="viewcourse.php?id='.$id.'" method="post">  <textarea cols=85 rows=3 name="comment" disabled >Please add the tutorial to your watchlist <br>Then youcan add notes</textarea></br><input type="submit" name="submit" value="Add Notes"disabled/></form>';}}
						else{$out1.='<form action="viewcourse.php?id='.$id.'" method="post"><textarea cols=85 rows=3 name="comment" disabled >Please Log in to comment</textarea></br><input type="submit" name="submit" value="Add notes"disabled/></form>';}
						echo $out1."</div></div><div class='login'><div id='content'><br><h1 class='dhead'>Comments</h1>";

	
$comment="";

if($loggedin==1){$comment.= '<form action="viewcourse.php?id='.$id.'" method="post"><textarea cols=85 rows=3 name="comment" placeholder="click to edit" ></textarea></br>
<input type="submit" name="submit" value="Submit!"/></form>';}
else{$comment.= '<form action="" method="post">Your Comment  :   <textarea cols=85 rows=3 name="about" disabled >Please Log in to comment</textarea></br>
<input type="submit" value="Submit! " disabled/></form>';}


$quirey3="SELECT * FROM membership.comments WHERE tutorial_id={$id}";
$result3=mysql_query($quirey3,$connection);
						if(!$result3){
						die("Cannot load your Comment" .mysql_error());

						} while($crow=mysql_fetch_array($result3)){
					
					$comment.="<div class='comment' id='c".$crow[0]."'><h1>{$crow[4]}<span>{$crow[3]}<span></h1><p>nl2br".nl2br($crow[2])."</p>";
					if($crow[4]==$session_username){$comment.='<button id="s'.$crow[0].'" onclick="delCmt('.$crow[0].')"><img src="img/eye.png" alt="del"/></button><span id="'.$crow[0].'">Remove this comment</span>';}
					else{$comment.='</div>';}
     
						}

$comment.='</div></div>';

echo $comment;

}

		}
		
		else{echo"It seems you are lost Search for some thing or Return to <u><a href='Courses.php'>Courses</a></u>";}






}





?>

<div class="right"><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNzEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner7_in.png" /></a>   <br><br><br>    <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png" /></a>

<div class="relt">
<h2>Related Courses</h2>
<?php 
//showing related videos 

for($i=0;$i<3;$i+=1){ 
if(!isset($id)){$id=ceil(rand(0,1) * 10);}
$quirey="SELECT id, course_name, soft, cat, LEFT(description, 105) AS descc, imglink, source FROM tutoscoop.courses WHERE id= {$id}";
$result=mysql_query($quirey,$connection);$row=mysql_fetch_array($result);
if(!$row){echo ' <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEyNjEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/300x250/banner5_in.png"  />';} else {$readmore=$row['descc'];
$lastspace=strrpos($readmore," ");
$read=substr($readmore,0,$lastspace);
echo "<a href=\"viewcourse.php?id={$row[0]}\"><div id=\"rel\"><p><h1>".$row[1]."</h1><b>Software:</b>".$row[2]."<div class=\"left\"><b>Categeory: </b>".$row[3]."</div></br><b>Description:</b>".$read.".... <b color='red'><i>Read More</i></b> </p></div></a>";

}
$id+=1;}?>


</div>

</div>



<div class="clear">




<div class="add3"> <a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjQ6IjEzMDEiO3M6MTA6InJlbG9hZF91cmwiO3M6MjY6Imh0dHA6Ly93d3cuY3Jhenlkb21haW5zLmluIjt9"><img src="http://www.crazydomains.in/images/affiliates/468x60/banner1_in.png" /></a><br><br><br><a href="http://www.crazydomains.in?affiliate=YToyOntzOjE5OiJhZmZpbGlhdGVfYmFubmVyX2lkIjtzOjM6Ijc0MSI7czoxMDoicmVsb2FkX3VybCI7czoyNjoiaHR0cDovL3d3dy5jcmF6eWRvbWFpbnMuaW4iO30="><img src="http://www.crazydomains.in/images/affiliates/728x90/banner1_in.jpg" /></a></div>    </div>

</div>
</div>
<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>
