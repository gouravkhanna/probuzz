<link rel="stylesheet" type="text/css" href="style/buzz.css ">
<div id="midpanel">
    <br/>
    <br/>
<div id="buzz">
    <form action="" method="get" >
   <span>Upadte Status</span>
    <div id="statusUp" name="statusUp" class="uparrowdiv">
  <textarea   rows="2" cols="68" placeholder="Wanna say something..." 
  id="buzztext" name="buzztext"></textarea>
 <input type=hidden value=buzz name=url> 
 <input type=hidden value=status name=controller>
 <input type="submit" value="BUZZ" id="subuzz" name=submit>
    </div>
     </form> 

     <div id="statusShow" name="statusShow">

     </div> 
</div> 
</div> <!-- END OF MID2 -->
<script >

$("#textbuzz").click(function()
{
$("#subuzz").show();


}
);


</script>