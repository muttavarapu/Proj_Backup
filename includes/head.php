<HEAD>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
  <TITLE>TutoScoop.com | Free Online Tutorial Library</TITLE>
  <META NAME="description" CONTENT="Monitored by Shrikanth Mutthavarapu, tutoscoop serves you the best free tutorials from around web,helps you learn multimedia skills like photoshop,web&game design etc">
  <META NAME="keywords" CONTENT="free tutorials videos,maya video tutorials,moviemaking tutorials,shrikanth tutorials,gamedevelopment tutorials,3D modelling video tutorials,Zbrush video tutorials">
  <META NAME="author" CONTENT="shrikanth">
  <META NAME="generator" CONTENT="NoteTab Light 7.1 (www.notetab.com)">
  <META NAME="created" CONTENT="2013-02-17">
  <link rel="stylesheet" type="text/css" href="styles/navstyle.css">
  
<link rel="stylesheet" type="text/css" href="styles/23style.css">






 <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />






</HEAD>
<BODY>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=519102974798482";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function showHint(bol,id)
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
    { var res = xmlhttp.responseText;          	
	if(res==1){
      document.getElementById(id).innerHTML="Added to watch List";
      document.getElementById("s"+id).innerHTML='<img src="img/del2.png"  alt= "Del"/>';}
	  else if(res==0){document.getElementById(id).innerHTML="Removed From watch List";
      document.getElementById("s"+id).innerHTML='<img src="img/ad.png"  alt= "add"/>';}
	  else{document.getElementById(id).innerHTML=xmlhttp.responseText;}
    }
  }
xmlhttp.open("GET","includes/subscribe.php?p="+bol+"&aid="+id,true);
xmlhttp.send();
}






</script>
<div class="logo"><?php if($loggedin==0){echo '<div class="head"><ul id="top1"><li><a href="login.php">Login</a></li><li><a href="register.php">Register</a></li></ul></div>';}
else {echo '<div class="head"><ul id="top"><li class="left"><a href="home.php" >Home</a></li><li class="left"><a href="profile.php">Profile</a></li><li class="left"><a href="watchlist.php">Watchlist('.$w_count.')</a></li><li class="right"><a href="includes/logout.php">Logout</a></li></ul></div>';} ?><div class="clear"> </div><div id="fixtop"><img src='logo.png'float='left'/>
<H1><a href="index.php">TutoScoop.com</a></H1><p id="tag">The free tutorial place!</p>

<P>Tutoscoop is a library of free tutorials collected from around the web.  It helps you learn skills with video tutorials.</P>
<div class="clear"> </div>
<?php include('includes/navigation.php')?>
<div class="clear"> </div></div>
</div>