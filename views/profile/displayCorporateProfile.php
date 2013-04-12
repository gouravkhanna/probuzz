<style >

</style>

<div id="bigmid">
<div class="leftarrowdiv"> 
  <div id="corp_img">
<img class="imgcorpp" src=<?php echo $arrData['profile_pic_path']; ?>>
 </div>
 <br><br>
  <div id="divider"> </div>
    <div id="corp_details">
        <div id="details_l">
    	   <h1> About </h1>
       <?php
        $data=$arrData[0];
          echo "<br><br><b> Tagline</b><br>";
     echo $data['tagline'];
     echo "<br><br><b> Description</b><br>";
     echo $data['summary'];


       ?>
   </div>
    <div id="details_r">
   <h2> Basic Info </h2>
       <?php
        $data=$arrData[0];
      //echo print_r($arrData);
         echo "<b> Company Alias</b>";
     echo "<span class='right_m'> ".$data['company_alias']. "</span>";
       echo "<br><br><b>Total Employee</b>";
     echo "<span class='right_m'> ".$data['number_of_employee']. "</span>";
      echo "<h2>Locations</h2>";
     echo "".$data['locations']. "";
     
  echo "<h2> Contact Info </h2>";
 echo "<b>Phone</b>";
     echo "<span class='right_m'> ".$data['phone_number']. "</span>";
     echo "<br><br><b>Website</b>";
     echo "<span class='right_m'> ".$data['website']. "</span>";
     echo "<br><br><b>Email</b>";
     echo "<span class='right_m'> ".$data['email_id']. "</span>";
       ?>

    </div>

        </div>



</div>
</div>
