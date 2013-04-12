<?php
	include 'controller.controller.php';
	class notifications extends Controller {
		function __construct() 	{
			parent::__construct();
		}
		public function home() {
		    $notifications=loadModel("notification","fetchNotifications");
			loadView("notification.php",$notifications);
		}
	}
?>