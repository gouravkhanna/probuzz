<div id="midpanel" >

<div id="daalljobs">
<button id=backjob onclick="fnBackJob()">Back</button>
<?php 

$id=$_SESSION['id'];
echo "<table id='showslot'><tr class=height40><th>SNO</th><th>CREATED_ON</th><th>LAST_DATE</th><th>STATUS</th><th>DESIGNATION</th></tr>";
$i=1;
		while($row=mysql_fetch_array($arrData))	{
	if($i%2==0) {
		$cClass="even";
	}
	else {
		$cClass="odd";
	}
			echo "<tr id='table".$row['id']."'" ;
			echo " class=$cClass><td>$i</td><td>".$row['createddate'];
			$status=$row['status']=='0'?"INACTIVE":"ACTIVE";
			echo "</td><td>".$row['lastdate']."</td><td>".$status."</td>";
			echo "<td><button id=".$row['id']." onclick=fnLoadApplicants(this.id) >".$row['designation']."</a></td></tr>";
			$i++;
		}
	echo "<tr class=height20 ></tr></table>";
		
?>
</div>
<button id=dabackbutton onclick="dabackbutton()">Back</button>
<div id="dashowapplicant">
</div>	

</div>