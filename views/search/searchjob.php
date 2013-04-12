<div id="bigmid">
	<div id="searchjob">
			<?php echo "<div id='showfrnddiv'><h2>".SEARCH_JOB ."</h2> </div>"; ?>
		
    	<form id="formsearchjob" name="formsearchjob" onsubmit="return false;">
			<br><br><br>
			<div id="dvformsearchjob">
				<span> <?php echo  DESIGNATION; ?></span> <span> <?php echo  MINIMUMSALARY; ?></span>
				<span> <?php echo  MAXIMUMSALARY; ?></span> <span> <?php echo  LOCATION; ?></span>
				<span id="e"> <?php echo EXPERIANCE;?></span> <span><br> <input
					type="text" placeholder="Enter Designation" name=sjdesignation
					id=sjdesignation> <input type="text"
					placeholder="Enter Minimum Salary" onblur="jsCheckNumber(this.id)"
					name=sjminsal id=sjminsal> <input type="text"
					placeholder="Enter Maximum Salary" onblur="jsCheckNumber(this.id)"
					name=sjmaxsal id=sjmaxsal> </span> <select id=sjexp
					class="marginl10" name=sjexp>
					<option></option>
					<option><?php echo FRESHER; ?></option>
					<option><?php echo _1;?></option>
					<option><?php echo _2;?></option>
					<option><?php echo _3;?></option>
					<option><?php echo _4;?></option>
					<option><?php echo _5;?></option>
					<option><?php echo _6;?></option>
					<option><?php echo _7;?></option>
					<option><?php echo _8;?></option>
					<option><?php echo _9;?></option>
					<option><?php echo _10;?></option>
					<option><?php echo _11;?></option>
					<option><?php echo Y12EARS; ?></option>

				</select>


				<div id="" class="floatl marginl10">

					<aside>
						<input type="text" title="Septate City by Comma (,) "
							id="sjclocation" name="sjclocation" placeholder="Enter City">
					</aside>
				</div>
				</div>
				<br />
				<br />
				<!-- 
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
 -->

				<input type="submit" name="search" id="sjsubmit" value="search">
			</form>
	</div>

	<div id="sjsearchres"></div>
	<button id='sjbackbutton'><?php echo BACK;?></button>

	<div id="sjappstatus"></div>
	<div id="sjjob"></div>
</div>
