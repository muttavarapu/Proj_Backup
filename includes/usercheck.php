 <?php
 require("connection.php");


 

$uname=$_GET["q"];
$uname=strtolower($uname);
if(strlen($uname)>4){
$query=mysql_query("SELECT * FROM membership.members WHERE username='$uname'")or die("failed to read dataAA into db".mysql_error());
  $check=mysql_affected_rows();
if($check==0){ //check if user has already registered 
  $response="Available";
}elseif($check !=0){
 //not registered
$response="Not available";
}else{$response="Users data read failed"; }
}else{$response="Username should be atleast 5 chars long";}

echo $response;





?>