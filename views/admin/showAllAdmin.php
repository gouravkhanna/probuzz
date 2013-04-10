<div id="midpanel">
	<div id="displayAllAdmin">
    
		<h3><?php echo ADMINACCOUNTLIST;?></h3>
		<hr/>
		<?php
			$count=1;
		?>
		<table id=buzztablem>
		<thead>
			<tr>
				<th><?php echo S_NO;?></th>
				<th><?php echo USERNAME;?></th>
				<th><?php echo STATUS;?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($arrData as $key => $value) {
				if($value['current_status']=="0") {
					$status=ACTIVE;
				} else if($value['current_status']=="1") {
					$status=INACTIVE;
				}
				echo "<tr>";
				echo "<td>".$count."</td>";
				echo "<td>".$value['user_name']."</td>";
				echo "<td>".$status."</td>";
				echo "</tr>";
				$count++;
			}
		?>
		</tbody>
		</table>
	</div>
</div>