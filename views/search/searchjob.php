
<div id="searchjob">
<input type="text" name=searchtext id=searchtext >

SALARY
MINIMUM EXPERIANCE

MAXIMUM EXPERIANCE

LOCATION

EXPERIANCE 
MINIMUM EXPERIANCE

MAXIMUM EXPERIANCE
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

</div>
<?php
