 <?php
 require("connection.php");
require_once("global.php");
include("functions.php");
 

 /*

$id = $_POST["id"];
$rating = $_POST["rating"];
$rating_type = array("like", "dislike");

if(in_array($rating, $rating_type)){
    
    include("settings.php"); //INCLUDES THE IMPORTANT SETTINGS
    
    //CHECKS IF $id EXISTS
    $q = mysql_query("SELECT * FROM $content WHERE id='$id'");
    $r = mysql_fetch_assoc($q);
    $id = $r["id"]; //NEW ID VARIABLE, USED TO CHECK IF IT'S IN THE DATABASE
    
    //COUNTS LIKES & DISLIKES IF $id EXISTS
    if($id)
    {
        //CHECKS IF USER HAS ALREADY RATED CONTENT
        $q = mysql_query("SELECT * FROM $ratings WHERE id='$id' AND ip='$ip'");
        $r = mysql_fetch_assoc($q); //CHECKS IF USER HAS ALREADY RATED THIS ITEM
        
        //IF USER HAS ALREADY RATED
        if($r["rating"]){
            if($r["rating"]==$rating){
                mysql_query("DELETE FROM $ratings WHERE id='$id' AND ip='$ip'"); //DELETES RATING
            } else {
                mysql_query("UPDATE $ratings SET rating='$rating' WHERE id='$id' AND ip='$ip'"); //CHANGES RATING
            }
        } else {
            mysql_query("INSERT INTO $ratings VALUES('$rating', '$id', '$ip')"); //INSERTS INITIAL RATING
        }
        
        include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED
     
        //EVERYTHING HERE DISPLAYED IN HTML AND THE "ratings" ELEMENT FOR AJAX
        echo $m;
    }
    else
    {
        echo "Invalid ID";
    }
}*/

$ID=$_GET["aid"];
$p=$_GET["p"];


//fill it with the votes that the article currently have
                                  
									 $uname=$session_username;

$query=mysql_query("SELECT * FROM membership.subscribers WHERE username='$uname' AND id='$ID'")or die("failed to read dataAA into db".mysql_error());
  $check=mysql_affected_rows();
if($check==0){ //if user has already voted we just return the current number of votes
  $query=mysql_query("INSERT INTO membership.subscribers(username,id,date) VALUES('$uname','$ID',NOW())")or die("failed to enter dataAA into db".mysql_error());
  $count_count=mysql_affected_rows();
$response=1;
}elseif($check==1){
 $query=mysql_query("DELETE FROM membership.subscribers WHERE username='$uname' AND id='$ID'")or die("failed to enter data into db".mysql_error()); $count_count=mysql_affected_rows();
$response=0;
}else{$response="Users data managind failed"; }
echo $response;



/*echo $ID.$p;*/


?>

