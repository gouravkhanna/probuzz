 	<?php
class view {
    function __construct() {
    }
    function loadView($templateName, $arrPassValue = '', $include = true) {
        $view_path = VIEW_PATH . $templateName;
        if (file_exists ( $view_path )) {
            if (isset ( $arrPassValue )) {
                $arrData = $arrPassValue;
            } 
            include_once ($view_path);
        } else {
            die ( $templateName . " ".TEMPLATE_NOT_FOUND );
        }
    }
}
?>