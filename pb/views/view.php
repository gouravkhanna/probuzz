<?php


class view
{	
	function __construct()
	{}
	function _load($name)
	{
		require "views/".$name;
	}

}
?>