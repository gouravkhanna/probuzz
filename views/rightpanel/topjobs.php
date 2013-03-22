<div id=rightpanel2>
<header id="topjobhead">Top Jobs</header>
<hr/>
<div id="topjobcontent">

<?php 
while($row=mysql_fetch_array($arrData))
{
?>
<div id="topjobn">
<!-- <a href="" > -->
<img class="imgcenter" id='<?php echo $row['id'];?>' onclick=fnLoadJobUser(this.id) src='<?php echo ROOTPATH.$row['path'];?>' height=50 width=50>
<aside class="calign hbold" ><?php echo $row['company_name']; ?><hr></aside>
<span class=marginl2>
<?php 
	echo HASOPENING.$row['designation'];
	if($row['location']!="") {
		echo IN.$row['location'] ;
	}
?> 
</span>

<!-- </a> -->  
</div>

<?php 
}
//print_r($row[0]);
?>

</div>

</div>