<?PHP 
foreach(@$arrData as $row){ 
	$c=1;
	echo "<br>";
	foreach ($row as $value) {
	if(is_array($value)){
		echo '<br><div id="cmmnt'.$c.'"class="comments"><span class="x">';
		echo "<img class='round5' src='".$value['path']."' height='50px' width='50px'/>";
        echo "<span class='s'> ";
        echo $value['comment_text'];
       echo "</span><br/></div>";
	$c++;
         echo "<br><hr>";
        } 

			}
  echo "</div>";    
}
 	                
 	                        




?>