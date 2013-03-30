<?PHP 


foreach(@$arrData as $row){ 
	foreach ($row as $value) {
		if(is_array($value)){

			foreach ($value as $comment) {
				echo "<br>".$comment;
			}
		}
	}
  
}
 	                
 	                        




?>