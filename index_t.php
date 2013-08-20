<?php require("includes/connection.php");?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>

<?php include('includes/head.php')?>
<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 
<BODY>
<div class="logo">
<H1><a href="index.php">TutoScoop.com</a></H1>

<P><hr>Tutoscoop is a library of free tutorials collected from around the web.It helps you learn skills with video tutorials.<hr></P>

<?php include('includes/navigation.php')?>


<div id="wrapper">
                <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/toystory.jpg" data-thumb="images/toystory.jpg" alt="" title="Welcome to <strong>Tutoscoop</strong>" data-transition="slideInLeft" />
                <a href="Courses.php?cat=modelling"><img src="images/up.jpg" data-thumb="images/up.jpg" alt="" title="Learn to Create Exiciting games" /></a>
                <img src="images/walle.jpg" data-thumb="images/walle.jpg" alt="" title="How the did they do this?" data-transition="slideInLeft" />
                <img src="images/walle.jpg" data-thumb="images/walle.jpg" alt="" title="#htmlcaption2" data-transition="slideInLeft" />
                <img src="images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
            </div><div id="htmlcaption2" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em>with out ra idiot <a href="#">a link</a>. 
            </div>
        </div>

    </div>
   
</div>









<div id="wrap">
<div class="add"></div>
<div id="content">

 <?php 
 
 // pagination requires 2 variables primarly  ...$number of pages...$howmany results2display per page.....$ where 2 start.....
 $perpage=5;
 //determines the number of pages
 $count_pages= mysql_query("SELECT COUNT('id ') FROM courses");
 $pages =ceil(mysql_result($count_pages,0)/$perpage);
 
 //checks where we are
 $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
 //to give the sql command wg=here to start ......it counts how many displayed previously and from where it should continue further
 $start = ($page - 1) * $perpage;
 

 
if(!$connection){
die("Cannot load your request:" .mysql_error());

}
else{
echo "</br>"."this is the content of the page</br>"; 
$quirey="SELECT * FROM courses LIMIT {$start},{$perpage}";
$result=mysql_query($quirey,$connection);

if(!$result){
die("Cannot load your request" .mysql_error());

}echo"<div class='context'>";
while($row=mysql_fetch_array($result)){
/*echo "<p>"."<h1>"."<a href=\"tutos.php?id={$row[0]}\">Learn".$row[2]." using the software ".$row[3]."</a>"."</h1><u>categeory </u>".$row[4]."</br>"."<div class='videoplayer'>".$row[6]."</div><b>Description:</b>".$row[5]."</p>";




*/echo '<div class="thumb">

<a href="tutos.php?id='.$row[0].'">   <div class="image">
  <img src="http://img.youtube.com/vi/CRKO4U_j4K4/hqdefault.jpg" />
  <div class="text">
    <h1>'.$row[2].'</h1>
    <p>Category'.$row[3].'</p>
  </div>
</div></a>Description:</b>'.$row[4].'</p></div>';

//echo '</br><a class="youtube" href="http://www.youtube.com/watch?v='.$row{5}.'"
 //           title="jQuery YouTube Popup Player Plugin TEST">Test Me</a>';
}


echo"</div>";




echo '<div class="clear"></div>';echo '<div class="pagination">';
echo "Your are viewing ".$page ." of ". $pages." pages <hr>";
if($pages >= 1 && $page <=$pages)
{							if (isset($_GET['page']))
							{$prev=$_GET['page'] - 1;
							echo '<a href=?page='.$prev.'>Previous </a>';}
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








<div class="right">G ADD</div> </div>     <div class="clear">        <div class="add3">        <img src="img/add.png"></img></div>    </div><a class="youtube" href="http://www.youtube.com/watch?v=4eYSpIz2FjU"
            title="jQuery YouTube Popup Player Plugin TEST">Test Me</a>


<?php include('includes/foter.php')?>

</BODY>
</HTML><?php mysql_close($connection);?>
