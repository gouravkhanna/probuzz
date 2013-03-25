<script type="text/javascript">


</script>

<div id="bigmid">
	<div id="dvsearchpeople">


		<h1 class=calign>SEACRH PEOPLE</h1>
		<hr />
		<button id="showoption">Hide</button>
		<div id="searchcriteria"></div>
		<div id="searchoptbar">
			<form id="searchpeopleform" action="#">
				<label id=lxcity><?php echo CITY;?></label>
				<hr />

				<div id=spdcity>
					<select title="Use CTRL to Select Multiple Cities" 
					class="vcenter floatl" id=spcity name=spcity[] multiple="multiple">
						<option><?php echo DELHI;?></option>
						<option><?php echo NOIDA;?></option>
						<option><?php echo BENGLORE;?></option>
						<option><?php echo CHENNAI;?></option>
						<option><?php echo MUMBAI;?></option>
						<option><?php echo GURGAON;?></option>
						<option><?php echo LONDON;?></option>
						</select>
						<aside >
							<?php echo IFOTHER;?>
							<input id="spccity" type="checkbox"
							name="other" value="other">
						</aside>
						<aside>		
						 	<input type="text" title="Septate City by Comma (,) "
						 	id="spccityother" name="spccityother" placeholder="Enter City">
						</aside> 
				</div>
				<br/><br/>
				
				<label id=lxdegree>DEGREE <?php  echo ""; ?></label>
				<hr />
				<div id=spddegree>
					<select class="vcenter floatl" title="Use CTRL to Select Multiple Cities" 
					id=spdegree name=spdegree[] multiple="multiple">
						<option>BA</option>
						<option>BCom</option>
						<option>BCA</option>
						<option>BBA</option>
						<option>MBA</option>
						<option>BSc</option>
						<option>B.Tech</option>
						<option>B.Arch</option>
						<option>MBA</option>
						<option>MCA</option>
						<option>MSc</option>
						<option>MBA</option>
						<option>M.Tech</option>
						<option>Phd</option>
					</select>
					<aside>
						<?php echo IFOTHER;?> <input id="spcdegree" type="checkbox"
						name="other" value="other">
					</aside>
					<aside>
					<input type="text" title="Septate City by Comma (,) "
					 id="spcdegreeother" name="spcdegreeother" placeholder="Enter Degree">
					</aside>
				</div>
				<br/><br/>
				<label id=lxgender><?php echo GENDER;?></label>
				<hr />
				<div id=spdgender>
					<div id=spgender>
						<input type=radio name=spgender value=male>
						<label id=lxmale><?php echo MALE;?></label> 
						<input type=radio name=spgender value=female> 
						<label id=lxfemale><?php echo FEMALE;?></label>
						<input type=radio name=spgender value=Both>
						<label id=lxboth><?php echo BOTH;?></label>
					</div>

				</div>
				<input type="submit" name="search" value="search" class="juiButton">
			</form>
		</div>


<?php
/* For Displaying the result of the search	*/
echo "<div id=dvresbig >";
if (! empty ( $arrData )) {
	
	foreach ( $arrData as $key => $val ) {
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