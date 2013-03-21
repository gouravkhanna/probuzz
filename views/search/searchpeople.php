<script type="text/javascript">


</script>

<div id="bigmid">
<div id="searchoptbar">
<div id=spdcity> 
<img id="upcity" src="data/rcs/up.png">
<img id="downcity" src="data/rcs/down.png">
<label id=lxstate><?php echo CITY;?></label>
<select id=spstate name=spstate>
	<option></option>
	<option><?php echo DELHI;?></option>
	<option><?php echo NOIDA;?></option>
	<option><?php echo BENGLORE;?></option>
	<option><?php echo CHENNAI;?></option>
	<option><?php echo MUMBAI;?></option>
	<option><?php echo GURGAON;?></option>
	<option><?php echo LONDON;?></option>
	<option><?php echo IFOTHER;?></option>
</select>
</div>
<div id=spdqualification>
<label id=lxqualification><?php echo QUALIFICATION?></label>
<select id=spqualification name=spqualification >
	<option></option>
	<option><?php echo HIGHSCHOOL;?></option>
	<option><?php echo INTERMEDIATE;?></option>
	<option><?php echo GRADUATE;?></option>
	<option><?php echo POSTGRADUATE;?></option>
	<option><?php echo MASTERS;?></option>
	<option><?php echo DOCTORATE;?></option>
	<option><?php echo IFOTHER;?></option>
</select>
</div>
<div id=spdgender>
<label id=lxgender><?php echo GENDER;?></label>
<select id=spgender name=spgender>
	<option><?php echo MALE;?></option>
	<option><?php echo FEMALE;?></option>
	<option><?php echo BOTH;?></option>
</select>
</div>
<button class="juiButton" >Search</button>
</div>


<?php
print_r($arrData);
echo "<div id=dvresbig >";
if ( !empty($arrData)) {
	foreach ( $arrData ["name"] as $key => $val ) {
		if ($val ['id'] != "") {
			$res = "<a href='" . $val ['id'] . "' >";
			$res .= "<div id=dvres>";
			$res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
			$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
			$res .= "</a>";
			echo $res;
		}
	}
}
echo "</div>";
?>
</div>