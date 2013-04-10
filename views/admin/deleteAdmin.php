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
				<th><?php echo ACTIVATE_DEACTIVATE;?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			foreach($arrData as $key => $value) {
				if($value['current_status']=="0") {
					$status=ACTIVE;
					$buttonValue=DEACTIVATE;
					$method="deactivate(this,".$value['user_id'].")";
				} else if($value['current_status']=="1") {
					$status=INACTIVE;
					$buttonValue=ACTIVATE;
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
		</tbody>
		</table>
	</div>
</div>