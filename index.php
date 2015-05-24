<?php
session_start();
$_SESSION['start']= gmmktime();

require_once "includes/main.php";

try 
{
	$action = $defaultAction;
	if( $debugMode)
	{
		error_reporting(E_ALL ^ E_NOTICE);
	}
	if( isset($_GET['page']))
	{
		$request = strtolower( clean($_GET['page']));	
		include("includes/controllers/".$request.".controller.php");
		$c = createContorller($request);	
		if( isset($_GET['action']))
		{
			$action = $_GET['action'];
		}
	}
	else
	{
		include("includes/controllers/".$defaultHomeController.".controller.php");
		$c = createContorller($defaultHomeController);
	}
	if(!method_exists($c,$action))
	{
		$action = $defaultAction;
	}
	$c->$action();
}
catch(Exception $e) {
	$_POST = array();
	render('error',array('message'=>$e->getMessage(),'trace'=> $e->getTraceAsString()));
}



?>
