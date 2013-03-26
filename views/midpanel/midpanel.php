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
  <?php while ($row = mysql_fetch_array($arrData)) 
                           {
                           	$pa=$row['path'];
                           	$date=strtotime($row['update_time']);
                           	echo '<div id="statusimg" name="statusimg">';
                           	echo "<a href=''><img src='$pa' height='50px' width='50px'></a></div>";
                           	echo "<div id='statusName' name='statusName'><a href=''>";
 	                        echo $row['first_name']." ".$row['last_name']."</a><span>". date('D-M-Y',$date)."</span></div>";
 	                        echo '<div id="statusText">'. $row['buzztext']. "</div>";
 	                       echo"<hr>";
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