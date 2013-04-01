<?php

if(!empty($arrData) && !empty($arrData['0'])) {
	foreach ( $arrData as $key => $val ) {
		if ($val ['id'] != "" && $val['id']!=@$_SESSION['id']) {
	//	$res = "<a href='".ROOTPATH."user/messages/" . base64_encode($val ['id']) . "' >";
			$cClass=($val['seen']==0)?"evenb":"oddb";
			$res ="<button class='$cClass' id='btnshowmsg' onclick='showMessage(".$val ['id'].")' >";
		//	$res .= "<div id=dvres class=round20>";
			$res .= "<img class='imgcenter floatl round5 margin' src='" . ROOTPATH . $val ['path'] . "' height=50 width=50 >";
			$res .= "<aside >" . $val ['first_name'] . "</aside><aside> " . $val ['last_name'] . "<aside>";
			$res .= "</button>";
			//$res .= "</a>";
			echo $res;
		}
	}
}
else {
echo "NO MESSEGES!! Start MEssaging";
}
?>