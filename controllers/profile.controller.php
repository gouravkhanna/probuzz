<?php
include 'controller.controller.php';
class profile extends Controller
{
	function __construct() 	{
		parent::__construct();
	}
	function home()
	{
		loadView('head/head1.php');
	  	$path=ROOTPATH.'data/photo/g.jpg';
	  	loadView('navigation/usernavigation.php',array('profile_pic_path'=>"$path"));
	  	loadView('head/head2.php');
	  	$this->view->loadView('profile.php');
	  	loadView('footer/footer.php');
		
	}		
}

?>