	<?php    
	function redirect_to($location =NULL){if($location!= NULL){header("Location:{$location}");}} 

	
	
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
	
									
				                    while($row=mysql_fetch_array($result))
									{ 
									
									 global $w_list;
									 global $loggedin;
						            $id=$row['id'];
									$readmore=$row['descc'];
				                    $lastspace=strrpos($readmore," ");
				                    $read=substr($readmore,0,$lastspace);
                                    $check =in_array($row[0],$w_list);

								$out3= "<div class=\"ele\"id=\"w".$row[0]."\"><a href=\"viewcourse.php?id={$row[0]}\" color=\"black\"><p><h1>".$row[1]."</h1><div class='view'><img src='img/eye.png'/><p>&nbsp views :  ".$row[8]."</p></div></p></a><div class='thub'><img class='thub2'src='http://img.youtube.com/vi/".$row[5]."/1.jpg' alt='image'/></div><div class=\"ele1\"><p><div class=\"left\"><b>Software : </b>".$row[2]."</div><b>Category : </b>".$row[3]."<br><b>Description: </b>".$read."....<a href=\"viewcourse.php?id={$row[0]}\">readmore</a></p></div><div class=\"ele2\">Level    :".$row[10]."<br>videos   :".$row[9]."<br>Duration :".$row[7]."minutes<br>Date     :    ".$row[11]."<br>";
								if($loggedin==1){
								if($check ==0){ $out3.='<div class="btn" id="s'.$row[0].'"  onclick="showHint(1,'.$row[0].')"><img src="img/ad.png" alt= "add"/></div><p><span id="'.$row[0].'">Add to watch list</span></p>';
                                             }
								else{  $out3.='<div class="btn" id="s'.$row[0].'" onclick="showHint(0,'.$row[0].')"><img src="img/del2.png" alt= "Del"/></div><p><span id="'.$row[0].'">In watchlist</span></p>';}
								           }
								else{$out3.="<a href='login.php'><button>Login to subscribe</button></a>";}
						
							    echo $out3.'</div><div class="fb-like" data-href="http://tutoscoop.com/viewcourse.php?id='.$row[0].'" data-width="100" data-layout="button_count" data-show-faces="true" data-send="true"></div></div>';	}

//<img src='img/eye.png'/>views    :".$row[8]."<br>
				                




				                    echo '<div class="clear"></div>';
							 }
function sort_menu($out1,$url){
$out1 .= "<div class='left'><b>Sort By:</b>&nbsp&nbsp&nbsp    Latest ".$url."&sort=id&val=ASC><img src='img/up.gif'/><span>Show Oldest First </span></a>".$url."&sort=id&val=DESC><img src='img/down.gif'/><span>Show Latest First </span></a>   Views ".$url."&sort=views&val=ASC><img src='img/up.gif'/><span>Least Viewed</span></a>".$url."&sort=views&val=DESC><img src='img/down.gif'/><span>Most Viewed</span></a>   Level ".$url."&sort=level&val=ASC><img src='img/up.gif'/><span>Show Basic</span></a>".$url."&sort=level&val=DESC><img src='img/down.gif'/><span>Show Advanced</span></a></div>";
echo $out1."<br></div>";
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
						
						
function filter($filter = NULL){
if($filter != NULL){
                         $query="SELECT DISTINCT cat FROM tutoscoop.courses WHERE soft='{$filter}'"; 
						 $output=mysql_query($query);
						 $out2="";
						  while($row=mysql_fetch_array($output))
									{
									$out2.= '<a href="Courses.php?soft='.$filter.'&cat='.$row[0].'">'.$row[0].'</a';
									
									}
						 
						return $out2;


}						
	
	}
	
	
	
	?>