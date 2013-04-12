<?php
	include 'controller.controller.php';
	
	/*
	 * notifications class
	 * This controller class handle the Notification module of the Site
	*/
	class notifications extends Controller {
		
		/*
		 * Constructor of notifications class calls the parent class constructor
		 * enabling notifications class to use the Controller Abilities
		*/
		function __construct() 	{
			parent::__construct();
		}
		
		/*
		 * home()
		 * This is the Default method of the notifications class.
		 * This method calls the model to load all the Notifications.
		*/
		public function home() {
		    $notifications=loadModel("notification","fetchNotifications");
			loadView("notification.php",$notifications);
		}
	}
?>