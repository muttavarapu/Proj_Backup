 <?php
 require("connection.php");
require_once("global.php");
include("functions.php");
$ID=$_GET["cid"];
$qry=mysql_query("DELETE FROM membership.comments WHERE c_id={$ID}")or die("failed to delete comment".mysql_error());
$count=mysql_affected_rows();
if($count==1){$response='Deleted';}
else{$response="Users data managind failed"; }
echo $response;



/*echo $ID.$p;*/


?>

