<?php
session_start();
$_SESSION =array();
session_destroy();
if(isset($_COOKIE['id_cookie'])){

setcookie("id_cookie","",time()-50000,"/");
setcookie("pass_cookie","",time()-50000,"/");setcookie("username_cookie","",time()-50000,"/");

}
if(isset($_SESSION['username'])){echo "we could not log you out".$_SESSION['username'];
exit();}else(header("Location:../login.php?msg='You have been logged out sucessfully'"));
?>