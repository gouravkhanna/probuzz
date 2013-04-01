<?php
function loadView($templateName,$arrPassValue=''){
    $profile_pic_path ="Aa";
         $view_path=VIEW_PATH.$templateName;
         if(file_exists($view_path)){
            if(isset($arrPassValue)){
                 $arrData=$arrPassValue;
            }
            include_once($view_path);
         }else{
            die($templateName. ' Template Not Found under View Folder');
         }

}

function loadModel($modelName,$function,$arrArgument=''){
         $model_path=MODEL_PATH.$modelName.'.class.php';
             
         if(file_exists($model_path)){
            if(isset($arr)){
                 $arrData=$arrPassValue;
            }

            include_once($model_path);
            $modelClass=$modelName;//.'class';
            if(!method_exists($modelClass,$function)){
                die($function .' function not found in Model '.$modelName);
            }

            $obj=new $modelClass;
            if(isset($arrArgument)){

                return $obj-> $function($arrArgument);
            }else{

                return $obj-> $function();
            }
         }else{
            die($modelName. ' Model Not Found under Model Folder');
         }


}

function listText($arg)
{
	$list=explode("\n", $arg);
	$str="<ul>";
	foreach($list as $value)
	{
		if(empty($value) || $value=="") {
			$str.="<br/>";
		}
		else {
			$str.="<li>$value</li>";
		}
	}
	$str.="</ul>";
	return $str;
	
} 
function time_elapsed($time) {
	$time = time() - $time; // to get the time since that moment

	$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'min',
			1 => 'sec	'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'')." ago";
	}
}
?>