<?PHP 
foreach(@$arrData as $row){ 
	$c=1;
	echo "<br>";
	foreach ($row as $value) {
	if(is_array($value)){
		echo '<br><div id="cmmnt'.$c.'"class="comments"><span class="x">';
		echo "<img class='round5 imgcenterm' src='".$value['path']."' height='30px' width='30px'/>";
         echo  "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $value ['id'] . "' >";
		echo $value['first_name']." ".$value['last_name'];
		echo "</a>";
      	echo "<span class='spancomment'> ";
        echo $value['comment_text'];
        
       echo "</span><span class=floatr>".time_elapsed ($value['comment_time'])."</span></div>";
	$c++;

        } 

			}
  echo "</div>";    
}
 	                
 	                        




?>