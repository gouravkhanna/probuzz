<div id=rightpanel2>
	<header id="topjobhead"><?php echo TOP_JOBS; ?></header>
	<hr />
	<div id="topjobcontent">

<?php
while ( $row = $arrData->fetch ( PDO::FETCH_ASSOC ) ) {
    ?>
<div id="topjobn">
			<!-- <a href="" > -->
			<img class="imgcenter" id='<?php echo $row['id'];?>'
				onclick=fnLoadJobUser(this.id)
				src='<?php echo ROOTPATH.$row['path'];?>' height=50 width=50>
			<aside class="calign hbold"><?php echo $row['company_name']; ?><hr>
			</aside>
			<span class=marginl2>
<?php
    echo HASOPENING . $row ['designation'];
    if ($row ['location'] != "") {
        echo IN . $row ['location'];
    }
    ?> 
</span>

		</div>

<?php 
}

?>

</div>

</div>