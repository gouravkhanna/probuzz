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
  <?php $count=0; while ($row = mysql_fetch_assoc($arrData)) 
                           {
                         
                           	$pa=$row['path'];
                           	$date=strtotime($row['buzz_time']);
                           	echo '<div id="statusimg" name="statusimg">';
                           	echo "<a href='index.php?controller=friends&url=friendsProfile&friendId=" . $row['id'] . "' >";
                           	echo "<img class='round5' src='".$pa."' height='50px' width='50px'/></a></div>";
                           	echo "<div id='statusName' name='statusName'><a href=''>";
 	                        echo $row['first_name']." ".$row['last_name']."</a><span>". date('D-M-Y',$date)."</span></div>";
 	                        echo '<div id="statusText">'. $row['buzztext'] ;
 	                        echo "<br><input type='text' id='comment' name='comment' placeholder='Post Comment...'>";
 	                       	echo "</div><hr>";
 }?>   
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