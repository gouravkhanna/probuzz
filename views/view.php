 	<?php
class view {
    function __construct() {
    }
    function loadView($templateName, $arrPassValue = '', $include = true) {
        $view_path = VIEW_PATH . $templateName;
        if (file_exists ( $view_path )) {
            if (isset ( $arrPassValue )) {
                $arrData = $arrPassValue;
            } /*
               * if($include) { include_once(VIEW_PATH.'head/head1.php');
               * include_once($view_path);
               * include_once(VIEW_PATH.'head/head2.php');
               * include_once(VIEW_PATH.'midpanel/midpanel.php');
               * include_once(VIEW_PATH.'rightpanel/rightpanel1.php');
               * include_once(VIEW_PATH.'rightpanel/rightpanel2.php');
               * include_once(VIEW_PATH.'footer/footer.php'); } else {
               * include_once($view_path); }
               */
            include_once ($view_path);
        } else {
            die ( $templateName . " ".TEMPLATE_NOT_FOUND );
        }
    }
}
?>