<div id="bigmid">
<div id="searchjob">
<script>
		
</script>
<h1>SEARCH JOB</h1><hr/>

<form id="formsearchjob" name="formsearchjob" onsubmit="return false;">
<div id="" class="" >
DESIGNATION
<input type="text" name=sjdesignation id=sjdesignation >
</div>
<div id="" class="">
SALARY
</div>
<div id="" class="">
MINIMUM SALARY
<input type="text" name=sjminsal id=sjminsal>
</div>
<div id="" class="">
MAXIMUM SALARY
<input type="text" name=sjmaxsal id=sjmaxsal>
</div>
<div id="" class="">
EXPERIANCE
<select id=sjexp name=sjexp>
<option>Fresher</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12+ years</option>

</select>
</div>

<div class="floatl">
LOCATION
<select id="sjlocation" title="Use CTRL to Select Multiple Cities" 
					class="vcenter floatl" name=sjlocation[] multiple="multiple">
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
							<input id="sjclocation" type="checkbox"
							name="other" value="other">
						</aside>
						<aside>		
						 	<input type="text" title="Septate City by Comma (,) "
						 	id="sjclocation" name="sjclocation" placeholder="Enter City">
						</aside> 
</div>
<br/><br/>

<div id=sjcat class="">
JOB CATEGORY
- Accounting	 
- General Business
- Other
- Admin & Clerical
- General Labor	 
- Pharmaceutical
- Automotive	 
- Government	 
- Professional Services
- Banking	 
- Grocery	 
- Purchasing 
- Procurement
- Biotech	 
- Health Care	 
- QA - Quality Control
- Broadcast 
- Journalism	 
- Hotel 
- Hospitality	 
- Real Estate
- Business Development	 
- Human Resources
- Intership	 
- Research
- Construction	 
- Information Technology	 
- Restaurant 
- Food Service
- Consultant	 
- Installation 
- Maintaince
- Repair	 
- Retail
- Customer Service	 
- Insurance	 
- Sales
- Design	 
- Inventory	 
- Science
- Distribution 
- Shipping	 
- Legal	 
- Skilled Labor 
- Trades
- Education 
- Teaching	 
- Legal Admin	 
- Strategy 
- Planning
- Engineering	 
- Management	 
- Supply Chain
- Entry Level 
- New Grad	 
- Manufacturing	 
- Telecommunications
- Executive	 
- Marketing	 
- Training
- Facilities	 
- Media 
- Journalism 
- Newspaper	 
- Transportation
- Finance	 
- Nonprofit 
- Social Services	 
- Warehouse
- Franchise	 
- Nurse
</div>
<div id="" class="floatl">
COMAPANY
<input type="text" name="sjcompany" id="sjcompany" >
</div>
<input type="submit" name="search" id="sjsubmit" value="search">
</form>aaaaaaaaaaaaaaaaaaaaaaaaa
<?php
print_r(PDO::getAvailableDrivers());
?>
</div>

<div id="jobsearchres">aa</div>

</div>

sjdesignation
sjminsal
sjmaxsal
