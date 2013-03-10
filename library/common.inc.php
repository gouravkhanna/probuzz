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
?>