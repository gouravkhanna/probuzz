<div id="midpanel">
	<div id="displayAllAdmin">
		<br/><br/><br/>
		<h3>All The Admin Account Users Are Listed Below.</h3>
		<hr/>
		<?php
			$count=1;
		?>
		<table>
			<tr>
				<th>S.No.</th>
				<th>User Name</th>
				<th>Status</th>
				<th>Activate/Deactivate</th>
			</tr>
		
		<?php
			foreach($arrData as $key => $value) {
				if($value['current_status']=="0") {
					$status="Active";
					$buttonValue="Deactivate";
					$method="deactivate(this,".$value['user_id'].")";
				} else if($value['current_status']=="1") {
					$status="Inactive";
					$buttonValue="Acitvate";
					$method="activate(this,".$value['user_id'].")";
				}
				echo "<tr id=".$value['user_id'].">";
				echo "<td>".$count."</td>";
				echo "<td>".$value['user_name']."</td>";
				echo "<td id='status_".$value['user_id']."' >".$status."</td>";
				echo "<td><input type='button' onclick='".$method."' value='".$buttonValue."' /> </td>";
				echo "</tr>";
				$count++;
			}
		?>
		</table>
	</div>
</div>