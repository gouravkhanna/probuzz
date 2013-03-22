<script type="text/javascript">


</script>
<!DOCTYPE html>
<html>
<div id="bigmid">
<div id="dvsearchpeople">


	<h1 class=calign>SEACRH PEOPLE</h1>
	<hr />
<button id="showoption" >Show</button>	
	<div id="searchoptbar">
	<form id="searchpeopleform">
		<div id=spdcity>
				<label id=lxcity><?php echo CITY;?></label>
			<select id=spcity name=spcity[] multiple="multiple">
				<option></option>
				<option><?php echo DELHI;?></option>
				<option><?php echo NOIDA;?></option>
				<option><?php echo BENGLORE;?></option>
				<option><?php echo CHENNAI;?></option>
				<option><?php echo MUMBAI;?></option>
				<option><?php echo GURGAON;?></option>
				<option><?php echo LONDON;?></option>
				<option value="other"><?php echo IFOTHER;?></option>
			</select>
		<input type="text" id="spdcityother" placeholder="Enter City" >
		</div>
		
		<div id=spdqualification>
			<label id=lxqualification><?php echo QUALIFICATION?></label> <select
				id=spqualification name=spqualification[] multiple="multiple">
				<option></option>
				<option><?php echo HIGHSCHOOL;?></option>
				<option><?php echo INTERMEDIATE;?></option>
				<option><?php echo GRADUATE;?></option>
				<option><?php echo POSTGRADUATE;?></option>
				<option><?php echo MASTERS;?></option>
				<option><?php echo DOCTORATE;?></option>
				<option value="other"><?php echo IFOTHER;?></option>
			</select>
		</div>
		
		<style>
		
		#searchoptbar select{
			height:100px;
			width:250px;
		}
		</style>
		<div id=spddegree>
			<label id=lxdegree>DEGREE <?php  echo ""; ?></label> 
			<select id=spdegree name=spdegree[] multiple="multiple" >
				<option> </option> 
				<option>BA </option>
				<option>BCom</option>
				<option>BCA </option>
				<option>BBA</option>
				<option>MBA</option>
				<option>BSc </option>
				<option>B.Tech </option>
				<option>B.Arch </option>
				<option>MBA</option>
				<option>MCA</option>
				<option>MSc</option>
				<option>MBA</option>
				<option>M.Tech </option>
				<option>Phd </option>
				<option value="other"><?php echo IFOTHER;?></option>		
		</select>
		
		</div>
	
		
		<div id=spdgender>
			<label id=lxgender><?php echo GENDER;?></label> <select id=spgender
				name=spgender[] multiple="multiple">
				<option></option>
				<option><?php echo MALE;?></option>
				<option><?php echo FEMALE;?></option>
				<option><?php echo BOTH;?></option>
			</select >
		</div>
		<input type="submit" name="search" value="search" class="juiButton">
		</form>
	</div>


<?php
print_r ( $arrData );
echo "<div id=dvresbig >";
if (! empty ( $arrData )) {

		foreach ( $arrData  as $key => $val ) {
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
</div>