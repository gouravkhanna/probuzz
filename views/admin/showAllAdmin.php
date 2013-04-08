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
			</tr>
		
		<?php
			foreach($arrData as $key => $value) {
				if($value['current_status']=="0") {
					$status="Active";
				} else if($value['current_status']=="1") {
					$status="Inactive";
				}
				echo "<tr>";
				echo "<td>".$count."</td>";
				echo "<td>".$value['user_name']."</td>";
				echo "<td>".$status."</td>";
				echo "</tr>";
				$count++;
			}
		?>
		</table>
	</div>
</div>