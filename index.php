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
		$controllerPath="includes/controllers/".$request.".controller.php";
		if(file_exists($controllerPath))
		{
			include($controllerPath);
			$c = createContorller($request);	
			if( isset($_GET['action']))
			{
				$action = $_GET['action'];
			}
		}
		else
		{
			throw new Exception("Sorry this is not the page you are looking for!");
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
	Renderer::render('error',array('message'=>$e->getMessage(),'trace'=> $e->getTraceAsString()),$globalTheme);
}
?>
