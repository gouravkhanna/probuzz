

<?php $count=1; 
if(!empty($arrData)) {
	foreach(@$arrData as $row)
                           {
                            
                    	$pa=@$row['buzz']['path'];
                      	$date=@strtotime($row['buzz']['buzz_time']);
                      	echo '<div id="statusimg'.$count.'"class="statusimg">';
                       	echo "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $row['buzz']['id'] . "' >";
                       	echo "<img class='round5' src='".$pa."' height='50px' width='50px'/></a></div>";
                       	echo '<div id="statusName'.$count.'"class="statusName"> <a href="   ">';
                       echo $row['buzz']['first_name']." ".$row['buzz']['last_name']."</a><span class='d'>". date('D-M-Y',$date)."</span></div>";
                       echo '<div id="statusText'.$count.'"class="statusText">'. $row['buzz']['buzztext'] ; 
			           echo "</div><br>";
						
	  echo "<div id='dvcomment".$row['buzz']['buzz_id']. "' >";
	
	foreach ($row['comment'] as $val) {
			$c=1;
		echo "<br>";
		if(is_array($val)){
	echo '<br><div id="cmmnt'.$c.'"class="comments">';
	echo "<img class='round5' src='".$val['path']."' height='50px' width='50px'/>";
    echo "<span class='s'> ";
    echo   $val['comment_text']  ;
	echo "</span></div><br>";
	$c++;
	     }

	}
 	                        
                  	echo "</div>";                  
                    
 	                      
				echo "<form method='get' name='$count'>"; 	
					
	                                                
                echo  "<input type=hidden value=comment name=url />" ;
                echo "<input type=hidden value=status name=controller /><br>";
                echo "<input type=hidden value=". $row['buzz']['buzz_id'] ." name=buzz_id >";
 	                        
                echo '<br><input type="text" id="comment'. $row['buzz']['buzz_id'].'" name=comment_text
                   		  class="comment" 
 	                        		  placeholder="Post Comment..." />';
 	                       	echo '<input type="button" id="'. $row['buzz']['buzz_id']. '"

 	                       	value="Comment" name=submit onclick=abbb(this.id) class="submit"> ' ;
 	                      
 	                        echo "</form><hr>";
 	                       	$count++;
 }
     
 
} else {
    echo "NO Buzz To display";
}
 ?>   
<script >

$(document).ready(function(){

//$(x).load("index.php","controller=status&url=displaycomment&buzz_id="+a);
});
function abbb(a){

var b="#comment"+a; // comment id
var z=$(b).val();
var x="#dvcomment"+a;

			$.ajax({
		        url:'index.php', //window.location.pathname,
		        type: 'GET',
		        data: 'controller=status&url=comment&buzz_id='+a+'&comment_text='+z,
		        	beforeSend:function(data){
		        	$(x).html("<img src='data/photo/load3.gif' alt='loading' >");		        	},
		        	success:function(data) {
                              
		        		$(x).load("index.php","controller=status&url=displaycomment&buzz_id="+a);
		        	},
			});
		
		

}
</script>