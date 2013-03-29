<link rel="stylesheet" type="text/css" href="style/buzz.css ">
<div id="midpanel">
    <br/>
    <br/>
<div id="buzz">
    <form action="" method="get" >
   Upadte Status
    <div id="statusUp" name="statusUp" class="uparrowdiv">
  <textarea   rows="2" cols="68" placeholder="Wanna say something..." 
  id="buzztext" name="buzztext"></textarea>
 <input type=hidden value=buzz name=url> 
 <input type=hidden value=status name=controller><br>
 <input type="submit" value="BUZZ" id="subuzz" name=submit>
    </div>
     </form> 

     <div id="statusShow" name="statusShow">
  <?php $count=1; foreach($arrData as $row)
                           {
                         
                           	$pa=$row['path'];
                           	$date=strtotime($row['buzz_time']);
                           	echo '<div id="statusimg'.$count.'"class="statusimg">';
                           	echo "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $row['id'] . "' >";
                           	echo "<img class='round5' src='".$pa."' height='50px' width='50px'/></a></div>";
                          	echo '<div id="statusName'.$count.'"class="statusName"> <a href="   ">';
 	                        echo $row['first_name']." ".$row['last_name']."</a><span>". date('D-M-Y',$date)."</span></div>";
 	                        echo '<div id="statusText'.$count.'"class="statusText">'. $row['buzztext'] ; 
 	                        
 	                        
 	                        echo "<form method='get' name='$count'>"; 	                        
 	                        echo  "<input type=hidden value=comment name=url />" ;
                            echo "<input type=hidden value=status name=controller /><br>";
 	                        echo "<input type=hidden value=". $row['buzz_id'] ." name=buzz_id >";
 	                        
 	                        echo '<br><input type="text" id="comment'. $count.'" name=comment_text  class="comment" placeholder="Post Comment..." />';
 	                       	echo '<input type="submit" id="save'.$count	.'" value="Comment" name=submit> ' ;
 	                        echo "</form></div><hr>";
 	                       	$count++;
 }
     
 
  
 ?>   
     </div> 
</div> 
</div> <!-- END OF MID2 -->
<script >

$("#buzztext").click(function()
{
$("#subuzz").show();
$("#statusUp").css("height","60px");

}
);


</script>