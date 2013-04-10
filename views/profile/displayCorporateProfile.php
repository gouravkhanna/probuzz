<style >
#corp_img{
	width: 800px;
		
}
#corp_details{
font-size: 14px;
width: 700px;
float: left;
margin-left: 40px;
border-radius: 4px;
height: 350px;
box-shadow:3px 3px 3px 3px #2d9be8;
/*background-image: url("data/rcs/corpbg.jpg");*/
}
#corp_details h1{
	margin-left: 120px;
	margin-top: 2px;
}

#divider{
	width: 1px;
	height: 350px;
	background-color: #2d9be8;
	float: left;
	margin-left: 45%;
	position: absolute;
}
#details_l{
	float: left;
	width:340px;
}
#details_r{
	float: right;
  width:340px;
}
.right_m{
	float: right;
	margin-right:70px;
}
.rr{
	margin-right: 1px;
}
</style>

<div id="bigmid">
<div class="leftarrowdiv"> 
  <div id="corp_img">
<img src=<?php echo ROOTPATH."/data/photo/oss.jpg"; ?>>
 </div>
 <br><br>
  <div id="divider"> </div>
    <div id="corp_details">
        <div id="details_l">
    	   <h1> About </h1>
       <?php
        $data=$arrData[0];
      //echo print_r($arrData);
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
