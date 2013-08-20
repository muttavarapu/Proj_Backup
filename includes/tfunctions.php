<?php    function redirect_to($location =NULL){if($location!= NULL){header("Location:{$location}");}} 
function pagination($page,$pages,$url) {
	
						if($pages > 1 and $page <= $pages)
								 {		echo '<div class="clear"></div>';	
										echo '<div class="pagination">';
										echo "Your are viewing ".$page ." of ". $pages." pages <hr>";
										if($pages >= 1 && $page <=$pages)
												
										{  						
												if ($page > 1)
												{//prev page button
												$prev=$page - 1;
												echo $url.$prev.">Previous </a>";}
												//page number diaplay  
												for($x=1;$x<=$pages;$x++){
												
														if($x == $page){echo "<b>".$url.$x.">".$x."&nbsp </a></b>";}
														else{echo $url.$x.">".$x."&nbsp </a>";}
												
															 }
										}
												
												
												//for next page button
												if($pages > 1 and $page < $pages)		{ 				$next=$page + 1;
														echo $url.$next.'>Next </a>';}
												
										  echo "</div>";
						}
	}
	
	
function showresult($result){
	
									echo"<div class='context'>";
				                    while($row=mysql_fetch_array($result))
									{
									  if(!empty($_SESSION['username'])){
									 $session_username=$_SESSION['username'];}
									 elseif(!empty($_COOKIE['username_cookie'])){$session_username=$_COOKIE['username_cookie'];}
						            $id=$row['id'];
									$readmore=$row['descc'];
				                    $lastspace=strrpos($readmore," ");
				                    $read=substr($readmore,0,$lastspace);
                                    $check=0;if(!empty($session_username)){
									$q = mysql_query("SELECT * FROM membership.subscribers WHERE id='$id' AND username='$session_username'") or die("failed to read userdata from db".mysql_error());;
                                    $check=mysql_num_rows($q);}

								$out3= "<div id=\"ele\"><p><a href=\"viewcourse.php?id={$row[0]}\"><h1>".$row[1]."</h1><div class='view'><img src='img/eye.png'/><p>&nbsp views :  ".$row[8]."</a></p></div><img src='http://img.youtube.com/vi/".$row[5]."/1.jpg' alt='image'/><div class=\"ele1\"><p><div class=\"left\"><b>Software : </b>".$row[2]."</div><b>Category : </b>".$row[3]."<br><b>Description: </b>".$read."....<a href=\"viewcourse.php?id={$row[0]}\">readmore</a></p></div><div class=\"ele2\">Level    :".$row[10]."<br>videos   :".$row[9]."<br>Duration :".$row[7]."minutes<br>Date     :    ".$row[11]."<br>";
								if(!empty($session_username)){
								if($check ==0){ $out3.="<button class='subscribe' data-article='".$row[0]."' data-vote='1'>Subscribe</button>";}
								else{  $out3.="<button class='subscribe' data-article='".$row[0]."' data-vote='0'>Subscribed</button>";}
								           }
								else{$out3.="<button class='subscribe'>Login to subscribe</button>";}
								$out3.="<span class='votes' data-article='".$row[0]."'>p</span>";
							    echo $out3."</div></div>";	}

//<img src='img/eye.png'/>views    :".$row[8]."<br>
				                    echo"</div>";




				                    echo '<div class="clear"></div>';
							 }
function sort_menu($out1,$url){
$out1 .= "<div class='left'><b>Sort By:</b>&nbsp&nbsp&nbsp    Latest ".$url."&sort=id&val=ASC><img src='img/up.gif'/></a>".$url."&sort=id&val=DESC><img src='img/down.gif'/></a>   Views ".$url."&sort=views&val=ASC><img src='img/up.gif'/></a>".$url."&sort=views&val=DESC><img src='img/down.gif'/></a>   Level ".$url."&sort=level&val=ASC><img src='img/up.gif'/></a>".$url."&sort=level&val=DESC><img src='img/down.gif'/></a></div>";
echo $out1."<br><hr>";
return $out1;


}
function radio($pram = NULL){if($pram != NULL){
                         $query="SELECT DISTINCT {$pram} FROM tutoscoop.courses"; 
						 $output=mysql_query($query);
						 $out2="";
						  while($row=mysql_fetch_array($output))
									{
									$out2.= '<option value='.$row[0].'">'.$row[0].'</option>';
									
									}
						 
						return $out2;}}
	?>