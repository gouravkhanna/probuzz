<div id="bigmid">
	<div id="dvsearchpeople">


		<div class=bluebutton ><span class='fontsize20 marginl10'><?php echo SEACRH_PEOPLE;?><span><br></div>
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
					<aside>
							<?php echo IFOTHER;?>
					</aside>
					<aside>
						<input type="text" title="Septate City by Comma (,) "
							id="spccityother" name="spccityother" placeholder="Enter City">
					</aside>
				</div>
				<br /> <br /> <label id=lxdegree><?php echo DEGREE;?> <?php  echo ""; ?></label>
				<hr />
				<div id=spddegree>
					<select class="vcenter floatl"
						title="Use CTRL to Select Multiple Cities" id=spdegree
						name=spdegree[] multiple="multiple">
						<option><?php echo BA; ?></option>
						<option><?php echo BCOM; ?></option>
						<option><?php echo BCA; ?></option>
						<option><?php echo BBA; ?></option>
						<option><?php echo BSC; ?></option>
						<option><?php echo BTECH; ?></option>
						<option><?php echo BARCH; ?></option>
						<option><?php echo MBA; ?></option>
						<option><?php echo MCA; ?></option>
						<option><?php echo MSc; ?></option>
						<option><?php echo MBA; ?></option>
						<option><?php echo MTECH; ?></option>
						<option><?php echo PHD; ?></option>
					</select>
					<aside>
						<?php echo IFOTHER;?>
					</aside>
					<aside>
						<input type="text" title="Septate City by Comma (,) "
							id="spcdegreeother" name="spcdegreeother"
							placeholder="Enter Degree">
					</aside>
				</div>
				<br /> <br /> <label id=lxgender><?php echo GENDER;?></label>
				<hr />
				<div id=spdgender>
					<div id=spgender>
						<input type=radio name=spgender value=male> <label id=lxmale><?php echo MALE;?></label>
						<input type=radio name=spgender value=female> <label id=lxfemale><?php echo FEMALE;?></label>
					</div>

				</div>
				<input type="submit" name="search" value="search" class="juiButton">
			</form>
		</div>


<?php
/* For Displaying the result of the search */
echo "<div id=dsvresbig >";
if (! empty ( $arrData )) {
    
    foreach ( $arrData as $key => $val ) {
        if ($val ['id'] != "") {
            $res = "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
			$res = "<a href='" . ROOTPATH . "index.php?controller=friends&url=friendsProfile&friendId=" . $val ['id'] . "' >";
			$res .= "<div id=dvres class='round20'>";
            $res .= "<img class='imgcenter floatl round5' src=" . ROOTPATH . $val ['path'] . " height=50 width=50 >";
            $res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside></div>";
            $res .= "</a>";
            echo $res;
        }
    }
} else {
    if (isset ( $_REQUEST ['search'] )) {
        echo NRF;
    }
}
echo "</div>";
?>
</div>
</div>