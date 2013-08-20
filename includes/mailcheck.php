 <?php
 require("connection.php");


 

$email=$_GET["q"];

if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email)){ //validate email address - check if is a valid email address
			$response= "You have entered an invalid email address!";}
else{

$query=mysql_query("SELECT * FROM membership.members WHERE email='$email'")or die("failed to read dataAA into db".mysql_error());
  $check=mysql_affected_rows();
if($check==0){ //if user has already voted we just return the current number of votes
  
  $response="Available";
}elseif($check !=0){
 
$response="Email address already registered with us";
}else{$response="Users data read failed"; }
}

echo $response;





?>